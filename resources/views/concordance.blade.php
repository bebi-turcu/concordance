<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Word Concordance</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="/css/normalize.css" type="text/css" rel="stylesheet">
        <link href="/css/app.css" type="text/css" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="textform max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <h1 class="text-gray-700">Word Concordance</h1>
                </div>

                <div class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="text-lg leading-7 font-semibold">Please enter text for analysis</div>
                            </div>

                            <form action="" method="post" class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                @csrf
                                <div class="form-group">
                                        <textarea class="form-control shadow {{ $errors->has('text') ? 'error' : '' }}"
                                                  name="text"
                                                  rows="8"
                                                  placeholder="Each sentence must be on a separate line"
                                        >{{ $text ?? '' }}</textarea>

                                    @if ($errors->has('text'))
                                        <div class="error">
                                            {{ $errors->first('text') }}
                                        </div>
                                    @endif
                                </div>
                                <input type="submit" name="submit" value="Submit" class="btn btn-dark btn-block mt-2">
                            </form>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel {{ Illuminate\Foundation\Application::VERSION }} (PHP {{ PHP_VERSION }})
                    </div>
                </div>
            </div>
            <div class="concordance max-w-6xl mx-auto sm:px-6 lg:px-8">
            @if (isset($concordance))
                <table>
                @foreach ($concordance as $word => $stats)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $word }}</td>
                        <td>{ {{ $stats['frequency'] }}:{{ $stats['sentences'] }} }</td>
                    </tr>
                @endforeach
                </table>
            @endif
            </div>
        </div>
    </body>
</html>
