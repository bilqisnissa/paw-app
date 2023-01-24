<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
/**
 * @param int $id
 */
class ArticleController extends Controller
{
    public function readArticleId($id) {
        $article = Article::find($id);
        if (is_null($article)) {
            return $this->sendError('Product not found');
        }
       return response() -> json(["success" => true, "message" => "Article List","data"=> $article]);
    }
    
    public function readArticle() 
    {
        return Article::all();
    }

        public function createArticle(Request $request)
        {
        $data = $request->all();
        try {
            // $article = new Article();
            // $article-> article_name=$data['article_name'];
            // $article-> article_category=$data['article_category'];
            // $article-> article_description=$data['article_description'];
            // $article-> article_how_to=$data['article_how_to'];
            
            // $article->save();
            // $status='BERHASIL.. BERHASIL';
            // return response()->json(compact('status', 'article'), 200);

            $request->validate([
                'name' => 'required',
                'category' => 'required',
                'description' => 'required',
                'how_to' => 'required',
                'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($image = $request->file('image')) {
                $destinationPath = 'image/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $data['image'] = "$profileImage";
            }

            Article::create($data);

            $status = 'success';
            return response()->json(compact('status', 'th'), 200);

        } catch (\Throwable $th) {
            $status='GAGAL';
            return response()->json(compact('status', 'th'), 401);
        }
    }
}
