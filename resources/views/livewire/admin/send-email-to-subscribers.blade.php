
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-5"> ارسال آخر الوظائف </h4>
            <div class="col-10 mx-auto">
                <div class="alert alert-success">{{ $message }}</div>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <div class="form-group col-8 mb-0">
                    <x-admin.input type="number" name="jobs-count" wire:model="jobsCount" id="jobs-count" :value="$jobsCount" style="margin-bottom: 0px !important; padding: 0.7rem 1.375rem !important;" />
                </div>
                <div class="me-2">
                    <x-admin.button class="btn btn-gradient-primary" style="margin-bottom: 0px !important" wire:click="sendEmail">
                        ارسال
                    </x-admin.button>
                </div>
            </div>
        </div>
    </div>
</div>
