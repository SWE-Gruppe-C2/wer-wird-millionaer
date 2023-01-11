<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Support;

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
        return view('questions-index', [
            'questions' => Question::all(),
            'categories' => Category::all()
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
            'answer_a' => 'required|string',
            'answer_b' => 'required|string',
            'answer_c' => 'required|string',
            'answer_d' => 'required|string',
            'correct_answer' => 'required',
            'difficulty' => 'required|int',
            'category' => 'required|int'
        ]);


        $answers = [$request->answer_a, $request->answer_b, $request->answer_c, $request->answer_d];

        $question = new Question();
        $question->text = $request->question;

        $question->answers = $answers;
        $question->correct_answer = $request->correct_answer;
        $question->difficulty = $request->difficulty;
        $question->category_id = $request->category;

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

        return view('question-edit', [
            'oldQuestion' => $question,
            'categories' => Category::all(),
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
        if ($question->text == $request->question
            && $question->answers[0] == $request->answer_a
            && $question->answers[3] == $request->answer_d
            && $question->answers[1] == $request->answer_b
            && $question->answers[2] == $request->answer_c
            && $question->correct_answer == $request->correct_answer
            && $question->difficulty == $request->difficulty
            && $question->category_id == $request->category) {

            //Überprüfen ob Änderungen vorgenommen worden sind.
            // Wenn nicht ->

                // Frage wurde nicht bearbeitet

                //customError
                $customError = "Es wurden keine Änderungen vorgenommen";

                //return view wie bei validate funktion Frage: muss man dann auch question übergeben
                return view('question-edit', [
                    'oldQuestion' => $question,
                    'categories' => Category::all(),
                    'customError' => $customError
                ]);
            }else if ($question->text == $request->question){

            $validator = $request->validate([
                'question' => 'required|string',
                'answer_a' => 'required|string',
                'answer_b' => 'required|string',
                'answer_c' => 'required|string',
                'answer_d' => 'required|string',
                'correct_answer' => 'required',
                'difficulty' => 'required|int',
                'category' => 'required|int'
            ]);

            $question->text = $request->question;
            $answers = [$request->answer_a, $request->answer_b, $request->answer_c, $request->answer_d];
            $question->answers = $answers;
            $question->correct_answer = $request->correct_answer;
            $question->difficulty = $request->difficulty;
            $question->category_id = $request->category;

            $question->save();

            return view('question-edit-success', ['question' => $question]);

            }
            else {

                $validator = $request->validate([
                    'question' => 'required|string|unique:questions,text',
                    'answer_a' => 'required|string',
                    'answer_b' => 'required|string',
                    'answer_c' => 'required|string',
                    'answer_d' => 'required|string',
                    'correct_answer' => 'required',
                    'difficulty' => 'required|int',
                    'category' => 'required|int'
                ]);

                $question->text = $request->question;
                $answers = [$request->answer_a, $request->answer_b, $request->answer_c, $request->answer_d];
                $question->answers = $answers;
                $question->correct_answer = $request->correct_answer;
                $question->difficulty = $request->difficulty;
                $question->category_id = $request->category;

                $question->save();

                return view('question-edit-success', ['question' => $question]);
            }
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

        if($request->difficulty == "all" && $request->category == "all"){
            $questions = Question::all();
        }elseif($request->difficulty == "all"){
            $questions = Question::where('category_id', $request->category)->get();
        }elseif($request->category == "all"){
            $questions = Question::where('difficulty', $request->difficulty)->get();
        }
        else{
            $questions = Question::where('difficulty', $request->difficulty)->where('category_id', $request->category)->get();
        }

        $categories = Category::all();

        return view('questions-index', [
            'questions' => $questions,
            'categories' => $categories,
            'categorySelect' => $request->category,
            'difficultySelect' => $request->difficulty
        ]);
    }

	public function questionView($id){
		$question = Question::where('id', $id)->get();
		$categories = Category::all();

		return view('question-view', [
			'question' => $question[0],
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
