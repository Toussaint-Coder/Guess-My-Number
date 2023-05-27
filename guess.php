<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>guess my number with php</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex bg-slate-800 items-center justify-center h-[100vh]">
    <div class="p-3 w-96 bg-zinc-500">
        <h2 class="text-white text-lg font-bold mb-4">*Guess a Number Between 1 and 10</h2>
        <form action="guess.php" class="w-full" method="post">
            <input type="number" class="w-full p-2 outline outline-1 outline-green-900" name="number">
            <input type="submit" class="p-3 rounded-sm bg-white/40 mt-4" value="Check" name="btn">
            <?php
            
            $guess = rand(1, 20);
            if (isset($_POST["btn"])) {
                try {
                    if (empty($_POST["number"])) {
                        throw new Exception("Invalid Guess");
                    } else {
                        $num = intval($_POST["number"]);
                        if ($num < $guess) {
                            throw new Exception("Too Small🔍");
                        } else if ($num > $guess) {
                            throw new Exception("Too High 📈");
                        } else if ($num == $guess) {
                            throw new Exception("You Win! ✨");
                        }
                    }
                } catch (Exception $e) {
                    print "<p class='font-bold mt-4'>" . $e->getMessage() . "</p>";
                }
            }
            ?>
        </form>
    </div>
</body>

</html>