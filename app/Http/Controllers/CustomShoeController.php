<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use App\Http\Requests\CustomizeRequest;
use Intervention\Image\ImageManagerStatic as Image;

class CustomShoeController extends Controller
{
    public function customize(){
        $templates = Template::select('id', 'name', 'image', 'price')->get();
        return view('customize')->with(compact('templates'));
    }

    public function getTemplate($id){
        $template = Template::findOrFail($id);
        return view('template')->with(compact('template'));
    }

    public function customizeTemplate(CustomizeRequest $request, $templateId){
        $template = Template::findOrFail($templateId);

        // Image Intervention
        Image::configure(['driver' => 'gd']);
        $img = Image::make('assets/images/templates/'.$template->image);
        
        $custom = \Image::make($request->file('custom_img'));

        if($custom->width() > $template->x){
            $custom->fit($template->x, $template->y, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }else{
            $custom->resize($template->x, $template->y, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }
        
        $position = $request['img_position'];

        if($request->img_position == 'top-left'){
            $xy = [$template->topx, $template->topy];
        }elseif ($request->img_position == 'left') {
            $xy = [$template->center];
        }else{
            $xy = [$template->bottomx, $template->bottomy];
        }

        $img->insert($custom, $position, ...$xy);

        $filename = date('Y_m_d-H_i_s');
        $img->save(storage_path('app/custom/'.$filename.'.jpg'));
        return view('confirm-custom')->with(compact('filename', 'template'));
    }
}
