if($request->hasFile('avatar'))
            {
                File::delete($profile->avatar);
                $file = $request->file('avatar');
                $file_extension = $file->getClientOriginalExtension(); // Lấy đuôi của file
                if($file_extension == 'png' || $file_extension == 'jpg' || $file_extension == 'jpeg'){
                        
                        }
                        else return redirect()->back()->with('error','Chưa hỗ trợ định dạng file vừa upload.');

                $file_name = $file->getClientOriginalName();
                $random_file_name = str_random(4).'_'.$file_name;
                while(file_exists('upload/anhdaidien/'.$random_file_name)){
                    $random_file_name = str_random(4).'_'.$file_name;
                }
                $file->move('upload/anhdaidien',$random_file_name);
                // $file_upload = new File();
                // $file_upload->name = $random_file_name;
                // $file_upload->link = 'upload/posts/'.$random_file_name;
                // $file_upload->post_id = $avatar->id;
                // $file_upload->save();
                $profile->avatar = 'upload/anhdaidien/'.$random_file_name;
            } 
            else $profile->avatar='';