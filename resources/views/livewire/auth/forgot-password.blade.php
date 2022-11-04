
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Restablecer contraseña</h4>
                                <p class='text-light p-2'>Recibirá un correo electrónico en un máximo de 60 segundos</p>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (Session::has('status'))
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('status') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @elseif (Session::has('correo'))
                            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('correo') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            @if (Session::has('demo'))
                            <div class="row">
                                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                    <span class="text-sm">{{ Session::get('demo') }}</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                                        data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            @endif
                            <form wire:submit.prevent="show">
                                
                                <div class="input-group input-group-outline mt-3 @if(strlen($correo ?? '') > 0) is-filled @endif">
                                    <label class="form-label">Correo</label>
                                    <input wire:model="correo" type="email" class="form-control"
                                        >
                                </div>
                                @error('correo')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Enviar</button>
                                </div>
                                {{-- <p class="mt-4 text-sm text-center">
                                    Don't have an account?
                                    <a href="{{ route('register') }}"
                                        class="text-primary text-gradient font-weight-bold">Sign up</a>
                                </p> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
