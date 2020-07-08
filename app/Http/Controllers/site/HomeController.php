<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Section;
use App\Post;
use App\DetailsPost;
use App\LastNew;
use App\Banner;
use App\Image;
use App\Tag;
use App\Comment;
//use App\PostTag;
use Illuminate\Support\Facades\Session;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use DB;
class HomeController extends Controller
{
    public function home()
    {	
         
     
        SEOTools::setTitle('Juliet');
        SEOTools::setDescription('كل ما يخص عالم المرأة');
        SEOTools::opengraph()->setUrl('https://juliet.fun');
        SEOTools::setCanonical('https://juliet.fun/lesson');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage('https://juliet.fun/public/site/img/logo/logo.png');
        
        
    	$sections = Section::all();
    	$posts = Post::all();
        $news   = LastNew::all();
        $banners = Banner::all();
        return view('site.index-cosmetic',compact('sections','posts','news','banners'));
    }
    public function details($slug, Request $request )
    {	
        
        $detailspost = Post::where('slug',$slug)->first();
        $blogKey = 'post_' . $detailspost->id;
       // dd($blogKey);
        // Check if blog session key exists
        // If not, update view_count and create session key
        if (!Session::has($blogKey)) {
            Post::where('id', $detailspost->id)->increment('view_count');
           
            Session::put($blogKey, 1);
        }
        $images  = Image::where('post_id', $detailspost->id)->get();
        $sections = Section::all();
        $postsSection = Post::orderBy('created_at', 'DESC')->paginate(5);
        
        $previous = Post::where('id', '<', $detailspost->id)->first();
        $next = Post::where('id', '>', $detailspost->id)->first();
        //dd($next);
      // $tagsPost = PostTag::where('post_id',$detailspost->id)->get();
     $comments = Comment::where('post_id', $detailspost->id )->get();
       //echo dd($postTag);
       $tags = Tag::with('posts')->orderBy('id', 'DESC')->get();
       
       
        SEOMeta::setTitle($detailspost->title);
        SEOMeta::setDescription($detailspost->body);
        // SEOMeta::addMeta('article:published_time', $detailspost->published_date->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $detailspost->section->name, 'property');
        SEOMeta::addKeyword(['كل  ما يخص المرأة', 'ميك اب', 'ازياء']);

        OpenGraph::setDescription($detailspost->body);
        OpenGraph::setTitle($detailspost->title);
        OpenGraph::setUrl('https://juliet.fun/');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('https://juliet.fun/:alternate', ['pt-pt', 'en-us']);

        
        // Namespace URI: http://ogp.me/ns/article#
        // article
            OpenGraph::setTitle('Post')
            ->setDescription('بعض المقالات الخاصة بعالم المرأة')
            ->setType('article')
            ->setArticle([
                'published_time' => $detailspost->created_at,
                'modified_time' => $detailspost->updated_at,
                'expiration_time' => 'datetime',
                'author' => 'profile / array',
                'section' => $detailspost->section->name,
                'tag' => 'string / array'
            ]);

         return view('site.details' , compact('detailspost','images' , 'sections' ,'postsSection' ,'next' , 'previous','tags','postTag','comments','tagsPost'));
    }
    public function search( Request $request){
            
         $posts = Post::where('title','like','%'.$request['search'].'%')->get();
         
         return view('site.search', compact('posts'));
    }
    public function savComment($slug , Request $request){
          $rules = [
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required',
        ];

        $this->validate($request , $rules);
        $detailspost = Post::where('slug',$slug)->first();
        
        $data = $request->except(['post_id']);
        $data['post_id'] = $detailspost->id ;
        $comment = Comment::create($data);
        
     
        Session::flash('message','تم  كتابة تعليق جديد ');
        return redirect()->back()->with('detailspost', 'detailspost');
    }
    public function singlePage($id){
        
        $sections = Section::find($id);
        $allSection = Section::all();
         $posts = Post::where('section_id', $id)->get();
         return view('site.singleSection', compact('sections' , 'posts','allSection'));
    }
}