<main
    class="-my-12 min-h-screen w-full flex
    justify-center items-center flex-col gap-6
    xl:gap-12 xl:flex-row"
>
    <section>
        <h1 class="text-2xl font-semibold">
            <?= $action == "login" ? "Inicia Sesión" : "Regístrate" ?>
        </h1>
        <p class=" text-neutral-500" >Ingresa tus datos para acceder</p>
        <a
            href=""
            class="text-right underline underline-offset-2
           text-blue-600 font-semibold text-sm"
        >
            <?= $action != "login" ? "Inicia Sesión" : "Regístrate" ?>
        </a>
    </section>
    <section>
        <form action="" class="space-y-4">
            <div class="space-y-2">
                <?php if ($action == "signup"): ?>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Nombre:</legend>
                        <input type="text" class="input" placeholder="Ingresa tu nombre" />
                    </fieldset>
                <?php endif; ?>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Correo:</legend>
                    <input type="email" class="input" placeholder="Ingresa tu correo" />
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Contraseña:</legend>
                    <input type="password" class="input" placeholder="Ingresa tu contraseña" />
                </fieldset>
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>
    </section>
</main>
