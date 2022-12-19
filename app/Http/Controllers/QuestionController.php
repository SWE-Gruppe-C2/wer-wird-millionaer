<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;

use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;


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

        //TODO: Fix error displaying on website after update of question
        //TODO: Fix redirecting to question edit success page


        // Frage wurde nicht verändert, überprüfe mögliche änderung von Frage inhalten (Antworten, Korrekte Antwort)
       /* if($question->text == $request->question){

            //Überprüfen ob Änderungen vorgenommen worden sind.
            // Wenn nicht ->
            if( $question->answers[0] == $request->antwort_a
                && $question->answer[3] == $request->antwort_d
                && $question->answer[1] == $request->antwort_b
                && $question->answer[2] == $request->antwort_c
                && $question->correct_answer == $request->korrekte_antwort){

                // Frage wurde nicht bearbeitet

                //error message setzten
                $errors = null;

                //return view wie bei validate funktion Frage: muss man dann auch question übergeben
                return view('question-edit', [
                    'oldQuestion' => $question,
                    'errors' => $errors
                ]);
            }else{

                //Normale Validate Funktion ohne auf FragenText Unique zu checken
                $validator = $request->validate([
                    'question' => 'required|string',
                    'antwort_a' => 'required|string',
                    'antwort_b' => 'required|string',
                    'antwort_c' => 'required|string',
                    'antwort_d' => 'required|string',
                    'korrekte_antwort' => 'required',
                    'schwierigkeit' => 'required|int',
                    'kategorie_id' => 'required|int'
                ]);

                //Werte abspeichern

                $question->text = $request->question;
                $answers = [$request->antwort_a, $request->antwort_b, $request->antwort_c, $request->antwort_d];
                $question->answers = $answers;
                $question->correct_answer = $request->korrekte_antwort;
                $question->difficulty = $request->schwierigkeit;
                $question->category_id = $request->kategorie_id;

                $question->save();

                return view('question-edit-success', ['question' =>$question]);

            }

        }else{*/



            $validator = $request->validate([
                'question' => 'required|string',
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

            // saving automatically updates the question in the database
            // no duplicates are created
            $question->save();

            return view('question-edit-success', ['question' =>$question]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return view('question-delete-success');
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

    public function questionFilter(Request $request){

        if($request->reset){
            $request->request->remove('schwierigkeit');
            $request->request->remove('kategorie_id');
        }

        if(empty($request->schwierigkeit) && empty($request->kategorie_id)){
            $questions = Question::all();
        }
        else{
            $questions = Question::where('difficulty', $request->schwierigkeit)->where('category_id', $request->kategorie_id)->get();
        }

        $categories = Category::all();

        return view('questions-filter', [
            'questions' => $questions,
            'categories' => $categories
        ]);
    }

    public function questionDeletePage($id){

        $question = Question::where('id', $id)->get();

        return view('question-delete', [
           'question' => $question[0]
        ]);
    }

}
