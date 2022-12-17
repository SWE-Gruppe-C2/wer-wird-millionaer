<x-base-layout :title="'Spielen'">
    <main class="spread-content">
        <div class="horizontal_bar">
            <x-forms.back/>
            <div><x-forms.mute/></div>
            <x-forms.money-tree/>
        </div>
        <div id="money_tree">
            <table>
                <tbody>
                <tr>
                    <td>15</td>
                    <td>€ 1 MILLION</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>€ 500.000</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>€ 250.000</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>€ 125.000</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>€ 64.000</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>€ 32.000</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>€ 16.000</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>€ 8.000</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>€ 4.000</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>€ 2.000</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>€ 1.000</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>€ 500</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>€ 200</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>€ 100</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>€ 50</td>
                </tr>
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
            <form action="{{ route('answer') }}" method="post" id="form">
                @csrf
                @foreach(range('A', 'D') as $index => $alph)
                    <div id="answer_{{ strtolower($alph) }}" class="answer button" onclick="submitWithValue({{ $index + 1 }})">
                        <span>{{ $question->answers[$index] }}</span>
                    </div>
                @endforeach
                <input type="hidden" name="answer" id="answer" value="">
            </form>
        </div>
    </main>
</x-base-layout>

{{--
<x-base-layout :title="''">
    <main class="spread-content">
        <div class="horizontal_bar">
            <x-forms.end-game/>
            <div><x-forms.mute/></div>
            <x-forms.money-tree/>
        </div>
        <div id="money_tree">
            <table>
                <tbody>
                <tr>
                    <td>15</td>
                    <td>€ 1 MILLION</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>€ 500.000</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>€ 250.000</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>€ 125.000</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>€ 64.000</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>€ 32.000</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>€ 16.000</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>€ 8.000</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>€ 4.000</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>€ 2.000</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>€ 1.000</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>€ 500</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>€ 200</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>€ 100</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>€ 50</td>
                </tr>
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
                <span></span>
            </div>
            <div id="answer_a" class="answer button">
                <span></span>
            </div>
            <div id="answer_b" class="answer button">
                <span></span>
            </div>
            <div id="answer_c" class="answer button">
                <span></span>
            </div>
            <div id="answer_d" class="answer button">
                <span></span>
            </div>
        </div>
    </main>
</x-base-layout>
-->
 --}}
