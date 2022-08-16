<x-app-layout>

    <x-admin.headline title="Settings" icon="settings" />

    <div class="row">
        <!-- General Settings -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="form-inline">
                        <h4 class="card-title">{{ __('General') }}</h4>
                        <!-- <p class="card-description"> Use the <code>.form-inline</code> class to display a series of labels, form controls, and buttons on a single horizontal row </p> -->

                        <div class="form-group">
                            <input type="text" class="form-control mb-3 mr-sm-2" id="site_title" placeholder="Site title">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control mb-3 mr-sm-2" id="tagline" placeholder="Tagline">
                        </div>

                        <div class="form-group">
                            <!-- <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div> -->
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control mb-3 mr-sm-2" id="inlineFormInputName2" placeholder="Tagline">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <!-- <label>Favicon</label> -->
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Favicon">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Favicon</button>
                                </span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Seo Settings -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="form-inline">
                        <h4 class="card-title">{{ __('Seo') }}</h4>
                        <!-- <p class="card-description"> Use the <code>.form-inline</code> class to display a series of labels, form controls, and buttons on a single horizontal row </p> -->

                        <div class="form-group">
                            <input type="text" class="form-control mb-3 mr-sm-2" id="site_title" placeholder="Site title">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control mb-3 mr-sm-2" id="tagline" placeholder="Tagline">
                        </div>

                        <!-- <div class="form-group">
                            <input type="text" class="form-control mb-3 mr-sm-2" id="inlineFormInputName2" placeholder="Meta Description">
                        </div> -->

                        <div class="form-group">
                            <textarea class="form-control" id="exampleTextarea1" placeholder="Meta Description" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Social Media Settings -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="form-inline">
                        <h4 class="card-title">{{ __('Social Media') }}</h4>
                        <!-- <p class="card-description"> Use the <code>.form-inline</code> class to display a series of labels, form controls, and buttons on a single horizontal row </p> -->

                        <div class="form-group">
                            <input type="text" class="form-control mb-3 mr-sm-2" id="facebook" placeholder="Facebook">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control mb-3 mr-sm-2" id="whatsapp" placeholder="Whatsapp">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control mb-3 mr-sm-2" id="twitter" placeholder="Twitter">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control mb-3 mr-sm-2" id="instagram" placeholder="Instagram">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>


        <!-- Logo -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="form-inline">
                        <h4 class="card-title">{{ __('Logo') }}</h4>

                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>