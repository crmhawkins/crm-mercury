<div class="container mx-auto">
    <form wire:submit.prevent="">
        <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
        <div class="card mb-3">
            <h5 class="card-header">
                Edit user
            </h5>
            <div class="card-body">
                <div class="mb-3 row d-flex align-items-center">
                    <label for="nombre_completo" class="col-sm-2 col-form-label"> <strong>Name</strong> </label>
                    <div class="col-sm-10">
                        <input type="text" wire:model="nombre_completo" class="form-control" name="nombre_completo"
                            id="nombre_completo" placeholder="Name">
                        @error('nombre_completo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row d-flex align-items-center">
                    <label for="dni" class="col-sm-2 col-form-label"> <strong>DNI</strong> </label>
                    <div class="col-sm-10">
                        <input type="text" wire:model="dni" class="form-control" name="dni" id="dni"
                            placeholder="DNI.">
                        @error('dni')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row d-flex align-items-center">
                    <label for="password" class="col-sm-2 col-form-label"> <strong>Change Password</strong> </label>
                    <div class="col-sm-8">
                        <input type="text" wire:model="newPassword" class="form-control" name="password" id="password"
                            placeholder="Change Password.">
                        @error('newPassword')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-primary" wire:click="generarPassword">Generate</button>
                    </div>
                </div>
                <p> Remember to save the password securely before saving new user data.</p>
                <div class="mb-3 row d-flex align-items-center">
                    <label for="telefono" class="col-sm-2 col-form-label"> <strong>Telephone</strong> </label>
                    <div class="col-sm-10">
                        <input type="number" wire:model="telefono" class="form-control" name="telefono" id="telefono"
                            placeholder="Telephone (ex; 111223344)">
                        @error('telefono')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row d-flex align-items-center">
                    <label for="email" class="col-sm-2 col-form-label"> <strong>Email</strong> </label>
                    <div class="col-sm-10">
                        <input type="text" wire:model="email" class="form-control" name="email" id="email"
                            placeholder="Email (ex; ejemplo@gmail.com)">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
            </div>
        </div>
        <div class="mb-3 row d-flex align-items-center gap-2">
            <button type="submit" wire:click="update()" class="btn btn-primary">Save</button>
            
            <button wire:click="destroy()" class="btn btn-danger">Delete</button>
        </div>
        
    </form>
</div>
