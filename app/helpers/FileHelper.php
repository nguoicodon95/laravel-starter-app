<?php

class FileHelper {

	public static function getLoc($loc) {

        $loc_1 = Config::get('settings.imageLoc.large');
        $loc_2 = Config::get('settings.imageLoc.small');

        if($loc === "large") {
        	return $loc_1;
        } else {
        	return $loc_2;
        }
	}

	public static function makeName($file, $type) {

		$ran = str_random(6); $name = "";

        // location
        $loc_1 = FileHelper::getLoc("large");
        $loc_2 = FileHelper::getLoc("small");

		if($type === "large") {
			$name .= $loc_1;
			$name .= $ran."_";
        	$name .= $file->getClientOriginalName();   	
		} else {
			$name .= $loc_2;
	        $name .= $ran."_thmb_";
			$name .=  $file->getClientOriginalName();
		}
		return $name;
	}

	public static function makeFile($f, $id) {

        $sf = new StreamFile;

		$file = $f;

        // name
		$l_name = FileHelper::makeName($file, "large");
		$s_name = FileHelper::makeName($file, "small");

		// read image from temporary file
		$l_file = Image::make($file);
		$s_file = Image::make($file);

		// get sizes
		$size_1 = Config::get('settings.imageSize.large');
		$size_2 = Config::get('settings.imageSize.small');

		$l_file->resize(600, null, function ($constraint) {
			$constraint->aspectRatio();
		});

		$s_file->resize(365, null, function ($constraint) {
			$constraint->aspectRatio();
		});

		$l_file->save($l_name);
		$s_file->save($s_name);

		if($id === null) {
			$sf->post_id = DB::getPdo()->lastInsertId();
		} else {
			$sf->post_id = $id;
		}
		
        $sf->file_url = $l_name;
        $sf->file_thmb_url = $s_name;
        $sf->save();

		return $file;

	}

	public static function saveFile($f) {
        $file = $f;
		FileHelper::makeFile($file, null);
	}

	public static function updateFile($f, $id) {
        $file = $f;
		FileHelper::makeFile($file, $id);
	}

	public static function deleteFile($file) {
		$deleted = false;
		if($file != "") {
			$sf = StreamFile::where('id', '=', $file);
			$fileUrl = StreamFile::where('id', '=', $file)->get();
			File::delete(public_path()."/".$fileUrl[0]->file_url);
			File::delete(public_path()."/".$fileUrl[0]->file_thmb_url);
			$sf->delete();
			$deleted = true;
		}
		return $deleted;
	}

}