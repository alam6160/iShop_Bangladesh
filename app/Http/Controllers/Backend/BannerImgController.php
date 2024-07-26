<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
//  use Image;
use Intervention\Image\Facades\Image;

class BannerImgController extends Controller
{
    public function BannerSetting(){

    	$setting = Banner::find(1);
    	return view('backend.setting.banner_update',compact('setting'));
    }


	public function BannerSettingUpdate(Request $request){
        $setting_id = $request->id;
        $imageUrls = [];

        $resizeDimensions = [
            'nav_img' => ['width' => 346, 'height' => 240],
            'first_img' => ['width' => 482, 'height' => 180],
            'second_img' => ['width' => 336, 'height' => 180],
            'third_img' => ['width' => 848, 'height' => 201],
        ];

        // Fetch the existing setting
        $bannerSetting = Banner::findOrFail($setting_id);

        // Process each image if it exists in the request
        foreach ($resizeDimensions as $imageName => $dimensions) {
            if ($request->file($imageName)) {
                // Check if the old image exists
                $oldImage = $bannerSetting->$imageName;
                if ($oldImage && file_exists($oldImage)) {
                    unlink($oldImage); // Delete the old image
                }

                $image = $request->file($imageName);
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

                // Define the directory path
                $directoryPath = 'upload/banner/'.$imageName;
                $filePath = $directoryPath.'/'.$name_gen;

                // Check if the directory exists, if not create it
                if (!file_exists($directoryPath)) {
                    mkdir($directoryPath, 0755, true);
                }

                // Save the new image
                Image::make($image)->resize($dimensions['width'], $dimensions['height'])->save($filePath);

                $imageUrls[$imageName] = $filePath;
            }
        }

        // Update the SiteSetting with the new image URLs
        $updateData = array_filter([
            'nav_img' => $imageUrls['nav_img'] ?? null,
            'first_img' => $imageUrls['first_img'] ?? null,
            'second_img' => $imageUrls['second_img'] ?? null,
            'third_img' => $imageUrls['third_img'] ?? null,
        ]);
        $bannerSetting->update($updateData);

        // Prepare notification
        $notification = array(
            'message' => 'Banner Image Updated Successfully',
            'alert-type' => 'info'
        );

        // Redirect back with notification
        return redirect()->back()->with($notification);
    }


}
