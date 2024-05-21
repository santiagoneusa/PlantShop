<footer class="text-center text-white" style="background-color: #25a55f">

    <div class="container">
        <section class="mt-3">
            <div class="row text-center d-flex justify-content-center pt-5">
                <div class="col-md-2">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="{{ route('home.index') }}" class="text-white">{{ __('app.home') }}</a>
                    </h6>
                </div>

                <div class="col-md-2">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="{{ route('plant.index') }}" class="text-white">{{ __('app.plants') }}</a>
                    </h6>
                </div>

                <div class="col-md-2">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="{{ route('guide.index') }}" class="text-white">{{ __('app.guides') }}</a>
                    </h6>
                </div>
        </section>

        <hr class="my-5" />

        <section class="mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <h1>{{ __('controller.titles.garden_of_eden') }}</h1>
                </div>
            </div>
        </section>

    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">{{ __('admin.copyright') }}{{ __('admin.names') }}</div>

</footer>