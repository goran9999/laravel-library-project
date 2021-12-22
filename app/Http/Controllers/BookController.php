<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static $wrap='book';
    public function index()
    {
        $books=Book::all();

        $my_books=array();
        foreach($books as $book){
            array_push($my_books,new BookResource($book));
        }

        return $my_books;
    }

    public function show(Book $book){
        return new BookResource($book);
    }

    public function getByAuthor($author_id){
        $books=Book::get()->where('author_id',$author_id);

        if(count($books)==0){
            return response()->json('Author with this id does not exist!');
        }

        $my_books=array();
        foreach($books as $book){
            array_push($my_books,new BookResource($book));
        }

        return $my_books;
    }

    public function myBooks(Request $request){
        $books=Book::get()->where('user_id',Auth::user()->id);
        if(count($books)==0){
            return 'You dont have saved books!';
        }
        $my_books=array();
        foreach($books as $book){
            array_push($my_books,new BookResource($book));
        }

        return $my_books;
    }

    public function getByCategory($category_id){
        $books=Book::get()->where('category_id',$category_id);

        if(count($books)==0){
            return response()->json('This category id does not exist!');
        }

        $my_books=array();
        foreach($books as $book){
            array_push($my_books,new BookResource($book));
        }

        return $my_books;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|String|max:255',
            'page_number'=>'required|Integer|max:15000',
            'publishinghouse'=>'required|String|max:255',
            'circulation'=>'required|Integer|max:3000000',
            'ISBN'=>'required|String|max:255',
            'author_id'=>'required',
            'category_id'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $book=new Book;
        $book->name=$request->name;
        $book->publishinghouse=$request->publishinghouse;
        $book->page_number=$request->page_number;
        $book->circulation=$request->circulation;
        $book->ISBN=$request->ISBN;
        $book->user_id=Auth::user()->id;
        $book->category_id=$request->category_id;
        $book->author_id=$request->author_id;

        $book->save();

        return response()->json(['Book stored successfully',new BookResource($book)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|String|max:255',
            'page_number'=>'required|Integer|max:15000',
            'publishinghouse'=>'required|String|max:255',
            'circulation'=>'required|Integer|max:3000000',
            'ISBN'=>'required|String|max:255',
            'author_id'=>'required',
            'category_id'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $book->name=$request->name;
        $book->page_number=$request->page_number;
        $book->publishinghouse=$request->publishinghouse;
        $book->circulation=$request->circulation;
        $book->ISBN=$request->ISBN;
        $book->author_id=$request->author_id;
        $book->category_id=$request->category_id;
        $book->user_id=Auth::user()->id;

        $result=$book->update();

        if($result==false){
            return response()->json('Problem updating book!');
        }
        return response()->json(['Book updated successfully!',new BookResource($book)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    { 
        $book->delete();

        return response()->json('Book '.$book->title .'deleted successfully!');
    }
}
