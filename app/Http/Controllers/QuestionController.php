<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;

use Illuminate\Http\Request;


class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $questions = Question::all();

        return view('questions-index', [
            'questions' => $questions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {

        //$validator = null;
        //$validator->setException( (new ValidationException($validator))->redirectTo('questions-add'));

        $validator= $request->validate([
            'question' => 'required|unique:questions,text',
            'antwort_a' => 'required|string',
            'antwort_b' => 'required|string',
            'antwort_c' => 'required|string',
            'antwort_d' => 'required|string',
            'korrekte_antwort' => 'required',
            'schwierigkeit' => 'required|int',
            'kategorie_id' => 'required|int'
        ]);


        $answers = [$request->antwort_a, $request->antwort_b, $request->antwort_c, $request->antwort_d];

        $question = new Question();
        $question->text = $request->question;

        $question->answers = $answers;
        $question->correct_answer = $request->korrekte_antwort;
        $question->difficulty = $request->schwierigkeit;
        $question->category_id = $request->kategorie_id;

        $question->save();

        $request->session()->put('questionAdded', true);

        return redirect('question-add');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Question $question)
    {
        $categories = Category::all();

        return view('question-edit', [
           'oldQuestion' => $question,
            'categories' => $categories
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(Request $request, Question $question)
    {
        $validator = $request->validate([
            'question' => 'required|unique:questions,text',
            'antwort_a' => 'required|string',
            'antwort_b' => 'required|string',
            'antwort_c' => 'required|string',
            'antwort_d' => 'required|string',
            'korrekte_antwort' => 'required',
            'schwierigkeit' => 'required|int',
            'kategorie_id' => 'required|int'
        ]);


        $question->text = $request->question;
        $answers = [$request->antwort_a, $request->antwort_b, $request->antwort_c, $request->antwort_d];
        $question->answers = $answers;
        $question->correct_answer = $request->korrekte_antwort;
        $question->difficulty = $request->schwierigkeit;
        $question->category_id = $request->kategorie_id;

        $question->save();

        //return view('question-edit-success', ['question' =>$question]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }

    public function questionAdd(Request $request){

        $categories = Category::all();

        if($request->session()->has('questionAdded')){
            $questionAdded = true;
        }
        else{
            $questionAdded = false;
        }

        $request->session()->forget('questionAdded');

        return(view('question-add', [
            'categories' => $categories,
            'questionAdded' => $questionAdded
        ]));
    }


}
