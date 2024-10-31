<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?><?= lang('Auth.login') ?> <?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="flex justify-center items-center min-h-screen p-5">
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6">
        <h5 class="text-2xl font-semibold mb-5"><?= lang('Auth.login') ?></h5>

        <?php if (session('error') !== null) : ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <?= session('error') ?>
            </div>
        <?php elseif (session('errors') !== null) : ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <?php if (is_array(session('errors'))) : ?>
                    <?php foreach (session('errors') as $error) : ?>
                        <?= $error ?><br>
                    <?php endforeach ?>
                <?php else : ?>
                    <?= session('errors') ?>
                <?php endif ?>
            </div>
        <?php endif ?>

        <?php if (session('message') !== null) : ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <?= session('message') ?>
            </div>
        <?php endif ?>

        <form action="<?= url_to('login') ?>" method="post">
            <?= csrf_field() ?>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2"><?= lang('Auth.email') ?></label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    inputmode="email"
                    autocomplete="email"
                    placeholder="<?= lang('Auth.email') ?>"
                    value="<?= old('email') ?>"
                    required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2"><?= lang('Auth.password') ?></label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    inputmode="text"
                    autocomplete="current-password"
                    placeholder="<?= lang('Auth.password') ?>"
                    required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Remember me -->
            <?php if (setting('Auth.sessionConfig')['allowRemembering']): ?>
                <div class="mb-4">
                    <label class="flex items-center">
                        <input
                            type="checkbox"
                            name="remember"
                            class="form-checkbox h-4 w-4 text-blue-600"
                            <?php if (old('remember')): ?> checked<?php endif ?>>
                        <span class="ml-2 text-gray-700"><?= lang('Auth.rememberMe') ?></span>
                    </label>
                </div>
            <?php endif; ?>

            <div class="mb-4">
                <button
                    type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    <?= lang('Auth.login') ?>
                </button>
            </div>

            <?php if (setting('Auth.allowMagicLinkLogins')) : ?>
                <p class="text-center text-gray-600 text-sm">
                    <?= lang('Auth.forgotPassword') ?>
                    <a href="<?= url_to('magic-link') ?>" class="text-blue-500 hover:text-blue-700">
                        <?= lang('Auth.useMagicLink') ?>
                    </a>
                </p>
            <?php endif ?>

            <?php if (setting('Auth.allowRegistration')) : ?>
                <p class="text-center text-gray-600 text-sm mt-2">
                    <?= lang('Auth.needAccount') ?>
                    <a href="<?= url_to('register') ?>" class="text-blue-500 hover:text-blue-700">
                        <?= lang('Auth.register') ?>
                    </a>
                </p>
            <?php endif ?>
        </form>
    </div>
</div>
<?= $this->endSection() ?>