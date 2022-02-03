<?php

namespace App\Http\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{

    public function store($data)
    {
        try {
            DB::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            $preview = $data['preview'];
            $data['preview'] = Storage::put('/images', $preview);
            $post = Post::firstOrCreate($data);

            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);

            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }


    public function update($data, $post)
    {

        try {

            DB::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            } else {
                $tagIds = [];
            }
            if (isset($data['preview'])) {
                $preview = $data['preview'];
                $data['preview'] = Storage::put('/image', $preview);
            }

            $post->update($data);
            $post->tags()->sync($tagIds);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }


        return $post;
    }


}
