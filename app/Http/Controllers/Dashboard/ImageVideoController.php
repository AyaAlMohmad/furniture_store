<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PhpParser\Builder\Function_;

class ImageVideoController extends DashboardController
{
    public function __construct(Image $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->module_actions = ['destroy', 'create', 'index', 'recycleBin', 'store', 'update', 'show', 'edit'];
        view()->share([
            'module_actions' => $this->module_actions,
        ]);
    }




    public function index()
    {
        $images = Image::all();
        $videos = Video::all();
        return view('dashboard.pages.image_videos.index', compact('images', 'videos'));
    }




    public function showImage($id)
    {
        $image = Image::find($id);
        return view('dashboard.pages.image_videos.showImage', compact('image'));
    }


    public function showVideo($id)
    {
        $video = Video::find($id);
        return view('dashboard.pages.image_videos.showVideo', compact('video'));
    }

    public function create()
    {
        return view('dashboard.pages.image_videos.form');
    }


    public function store(Request $request)
    {
        if (request()->hasFile('video') && request('video') != '') {
        
            $video = request()->file('video');
            $videoName = time() . '.' . $video->extension();
            $video->move(public_path('videos/slider'), $videoName);
            Video::create([
                'video' => $videoName
            ]);
        }
        if (request()->hasFile('image') && request('image') != '') {
          
            $image = request()->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/slider'), $imageName);
            Image::create([
                'image' => $imageName
            ]);
        }
        session()->flash('success','The creation has been saved successfully');

        return redirect($this->index_route);
    }



    public function editImage($id)
    {
        $item = Image::withTrashed()->findOrFail($id);
        return view('dashboard.pages.image_videos.editImage', compact('item'));
    }


    public function updateImage(Request $request,$id)
    {
        $Image=Image::find($id);

        if (request()->hasFile('image') && request('image') != '') {
            $imagePath = public_path('images/slider/' . $Image->image);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
          
            $image = request()->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/slider'), $imageName);
            $Image->update(['image' => $imageName]);
        }
        session()->flash('success','The modifications were saved successfully');

        return redirect($this->index_route);
    }


    public function editVideo($id)
    {
        $item = Video::withTrashed()->findOrFail($id);
        return view('dashboard.pages.image_videos.editVideo', compact('item'));
    }


    
    public function updateVideo(Request $request,$id)
    {
        $Video=Video::find($id);
        if (request()->hasFile('video') && request('video') != '') {
            $videoPath = public_path('videos/slider/' . $Video->video);
            if (File::exists($videoPath)) {
                unlink($videoPath);
            }


            $video = request()->file('video');
            $videoName = time() . '.' . $video->extension();
            $video->move(public_path('videos/slider'), $videoName);
       
            $Video->update([
                'video' => $videoName
            ]);
        }
        session()->flash('success','The modifications were saved successfully');

        return redirect($this->index_route);
    }
  
    public function destroyImage($id)
    {
        $item = Image::findOrFail($id)->delete();
        session()->flash('success','Moved to Recycle Bin');


        return redirect()->back();
    }
    public function destroyVideo($id)
    {
        $item = Video::findOrFail($id)->delete();
        session()->flash('success','Moved to Recycle Bin');


        return redirect()->back();
    }
    public function recycleBin()
    {
        $images = Image::onlyTrashed()->get();
        $videos = Video::onlyTrashed()->get();
        return view('dashboard.pages.image_videos.recycleBin', compact('images', 'videos'));
    }

    public function restoreImage($id)
    {
        $item = Image::withTrashed()->find($id);
        $restore = $item->restore();
        session()->flash('success','Data has been restored');

        return redirect()->back();
    }
    public function restoreVideo($id)
    {
        $item = Video::withTrashed()->find($id);
        $restore = $item->restore();
        session()->flash('success','Data has been restored');

        return redirect()->back();
    }
    public function finalDeleteImage($id)
    {

        $item = Image::withTrashed()->find($id);
        $finalDelete = $item->forceDelete();
        session()->flash('success','Permanently deleted');

        return redirect()->back();
    }
    
    public function finalDeleteVideo($id)
    {

        $item = Video::withTrashed()->find($id);
        $finalDelete = $item->forceDelete();
        session()->flash('success','Permanently deleted');

        return redirect()->back();
    }
}
