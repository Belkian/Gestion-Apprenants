<div class="hidden" id="Include_Cours">
    <?php
    if (isset($cour) && !empty($cour)) {
        foreach ($cour as $key => $value) {
            echo   '<div class="m-auto w-full *:w-full bg-gray-100 p-5">
        <h2 class="text-3xl"></h2>
        <p>Nombre de participants</p>
        <p>date</p>
        <label for="code">Code</label>
        <input type="number" name="code" id="code" value="" class="mb-3">
        <button class="font-medium bg-sky-500 text-white p-3 rounded ">Valider présence</button>
    </div>';
        };
    };
    ?>
</div>