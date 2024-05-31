<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('crossword.png') }}">
    <title>Crossword Puzzle</title>
    <style>
        body {
            background-color: #5AB2FF;
            font-family: Arial, sans-serif;
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        .puzzle-step {
            display: flex;
            justify-content: space-around;
            margin: 20px auto;
            width: 80%;
        }
        .puzzle {
            margin-bottom: 30px;
            border-radius: 10px;
            overflow: hidden;
        }
        table {
            background-color: #CAF4FF;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            margin: 0 auto;
        }
        td {
            width: 30px;
            height: 30px;
            padding: 3px;
            text-align: center;
            border: 1px solid black;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        .step {
            border: 1px solid gray;
            border-radius: 10px;
            background-color: lightgray;
            padding: 20px;
            margin-bottom: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        ol {
            padding-left: 20px;
        }
        ol li {
            margin-bottom: 10px;
            color: #444;
        }
    </style>
</head>
<body>
    <h1>Crossword Puzzle</h1>
    <div class="puzzle-step">
        <div class="puzzle">
            <table>
                @foreach ($board as $row)
                    <tr>
                        @foreach ($row as $cell)
                            <td>{{ $cell }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="step">
            <h2>Solution Steps</h2>
            <ol>
            @foreach ($steps as $index => $step)
                @if ($index > 0)
                    <li>{{ $steps[$index - 1] }}</li>
                @endif
            @endforeach
            </ol>
        </div>
    </div>
</body>
</html>
