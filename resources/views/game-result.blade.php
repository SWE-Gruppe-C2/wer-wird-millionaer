<x-base-layout :title="'Ergebnis'">
    <main class="spread-content">
        <div class="horizontal_bar">
            <x-forms.back/>
            <div><x-forms.mute/></div>
            <x-forms.money-tree/>
        </div>

        <div id="hub">
            <div id="logo"></div>
        </div>

        <div id="joker" class="horizontal_bar">
            <x-forms.fifty-fifty/>
            <x-forms.ask-audience/>
            <x-forms.call-friend/>
        </div>

        <div class="button_wrapper">
            <div id="question" class="button">
                <span>{{ $question->text }}</span>
            </div>

            @foreach(range('A', 'D') as $index => $alph)
                <a
                    id="answer_{{ strtolower($alph) }}"
                    class="answer button
                    {{ ($index + 1) == $question->correct_answer ? 'correct' : '' }}
                    {{ ($index + 1) == $chosen ? 'chosen' : '' }}
                    "
                    href="{{ route('answer', ['id' => $index + 1]) }}">
                    <span>{{ $question->answers[$index] }}</span>
                </a>
            @endforeach

            <script>
                setTimeout("location.href = '{{ route('answer', ['id' => $chosen]) }}'", 5000);
            </script>
        </div>
    </main>
</x-base-layout>
