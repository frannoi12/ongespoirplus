<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SDK-LARAVEL</title>
</head>

<body>
    <div class="pt-5">
        <div class="container mx-auto">
            <div class="flex flex-col justify-content-center align-items-center bg-gray-400">

                @if(session()->has('info'))
                <div class="p-1 text-red-500 text-center" role="alert">
                    {{session('info')}}
                </div>
                @endif
                <div class="w-full md:w-1/2 text-center p-2">
                    <h1 class="text-center text-3xl font-bold">SDK LARAVEL</h1>
                </div>
                <div class="w-full md:w-1/2">
                    <form method="POST" action="">
                        @csrf
                        <div class="w-full">
                            <div class="mt-3">
                                <label for="exampleInputMontant"
                                    class="block text-sm font-medium text-gray-700">Montant:</label>
                                <input type="number"
                                    class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    id="exampleInputMontant" name="amount" value="100" aria-describedby="emailHelp">
                            </div>
                            <div class="mt-3">
                                <label for="exampleInputDevise"
                                    class="block text-sm font-medium text-gray-700">Devise:</label>
                                <select
                                    class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    name="currency" aria-label="Default select example">
                                    <option selected value="XOF">XOF</option>
                                    <option value="XAF">XAF</option>
                                    <option value="CDF">CDF</option>
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-full text-center mt-3">
                            <button type="submit"
                                class="btn btn-success bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Effectuer
                                le payer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
