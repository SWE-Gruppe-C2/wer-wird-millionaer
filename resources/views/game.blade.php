<x-base-layout :title="'Spielen'">
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
                <span>{{ $question->text }}</span>
            </div>
            @foreach(range('A', 'D') as $index => $alph)
                <a id="answer_{{ strtolower($alph) }}" class="answer button" href="{{ route('game.result', ['id' => $index + 1]) }}">
                    <span>{{ $question->answers[$index] }}</span>
                </a>
            @endforeach
        </div>
    </main>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            initMusic({{ $question->difficulty - 1 }});
            startMusic();
        })
    </script>
</x-base-layout>

