<x-base-layout :title="'Ergebnis'">
    <main class="spread-content">
        <div class="horizontal_bar">
            <x-forms.end-game/>
            <div onclick="mute()"><x-forms.mute/></div>
            <x-forms.money-tree/>
        </div>

        <div id="money_tree">
            <table>
                <tbody>
                @foreach($stages->reverse() as $index => $stage)
                    <tr class="{{ $game->stage->id == ($index + 1) ? 'current_level' : '' }}">
                        <td>{{ $index + 1 }}</td>
                        <td>€ {{ number_format($stage->price, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div id="hub">
            <div id="logo"></div>
            <div id="audience_opinion">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <span>A</span>
                <span>B</span>
                <span>C</span>
                <span>D</span>
            </div>
            <p id="friends_opinion"></p>
        </div>

        <div id="joker" class="horizontal_bar">
            <x-forms.fifty-fifty/>
            <x-forms.ask-audience/>
            <x-forms.call-friend/>
        </div>

        <div class="button_wrapper">
            <div id="question" class="button">
                <span >€ {{ number_format($game->stage->price, 0, ',', '.') }}</span>
            </div>

            @foreach(range('A', 'D') as $index => $alph)
                <a
                    style="pointer-events: none"
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
                window.addEventListener('DOMContentLoaded', () => {
                    initMusic({{ $question->difficulty - 1 }})

                    if({{ $question->correct_answer }} === {{ $chosen }})
                        win();
                    else
                        lose();

                    let audioLength = document.getElementById("secondaryMusic").duration;
                    document.getElementById("secondaryMusic").onloadedmetadata = function () {
                        audioLength = document.getElementById("secondaryMusic").duration * 1000;
                        setTimeout("window.location.href = '{{ route('answer', ['id' => $chosen]) }}'", parseInt(audioLength) + 200);
                    }
                })
            </script>
        </div>
    </main>
</x-base-layout>
