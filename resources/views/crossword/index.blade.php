<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('crossword.png') }}">
    <title>Crossword Puzzle</title>
    <style>
        body {
            background-color: #f0f8ff;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            color: #2c3e50;
            margin-top: 20px;
            font-size: 3em;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }
        h2 {
            color: #34495e;
            margin-bottom: 20px;
            font-size: 2em;
            text-align: center;
        }
        .puzzle-step {
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin: 20px auto;
            width: 80%;
            max-width: 1000px;
        }
        .puzzle {
            margin-bottom: 30px;
            padding-top: 30px;
            padding-bottom: 30px;
            border-radius: 15px;
            overflow: hidden;
            border: 3px solid #3498db;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
        table {
            background-color: #ecf9ff;
            border-collapse: collapse;
            margin: 0 auto;
        }
        td {
            width: 40px;
            height: 40px;
            padding: 5px;
            text-align: center;
            border: 1px solid #bdc3c7;
            font-size: 1.5em;
            color: #2c3e50;
        }
        .step {
            border: 3px solid #3498db;
            border-radius: 15px;
            background-color: #ecf0f1;
            padding: 30px;
            margin-bottom: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
        ol {
            padding-left: 40px;
        }
        ol li {
            margin-bottom: 15px;
            color: #7f8c8d;
            font-size: 1.2em;
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
