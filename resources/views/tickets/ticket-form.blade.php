<form method="post" class="event-ticket-search-form">
    <div class="modal-header">
        <h5 class="modal-title" id="modal-{{$ticket->id}}-Label">{{$ticket->title}} - {{ $ticket->price}}</h5>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Fullname" required>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="tel" class="form-control" name="phone" value="{{old('phone')}}" placeholder="Phone" required>
        </div>

        <div class="form-group">
            <div class="form-check form-check-inline">
                <input class="form-check-input" autocomplete="off" type="radio" name="customer_type" value="person">
                <label class="form-check-label" autocomplete="off" for="inlineRadio1">Person</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="customer_type" checked value="organization">
                <label class="form-check-label" for="inlineRadio2">Organization</label>
            </div>
        </div>

        <div class="form-group for_organization">
            <div class="form-group">
                <input type="text" class="form-control" name="company" value="{{old('company')}}" placeholder="Company name">
            </div>
        </div>

        <div class="form-group for_organization">
            <div class="form-group">
                <input type="text" name="rs" value="{{old('rs')}}" minlength="20" maxlength="20" class="form-control" placeholder="Bank account number">
            </div>
        </div>

        <div class="form-group for_organization">
            <div class="form-group">
                <input type="text" name="bank" value="{{old('bank')}}" class="form-control" placeholder="Bank name">
            </div>
        </div>

        <div class="row for_organization">
            <div class="col-sm">
                <div class="form-group">
                    <input type="text" minlength="10" name="inn" value="{{old('inn')}}" maxlength="12" class="form-control" placeholder="Inn">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <input type="text" class="form-control" name="kpp" value="{{old('kpp')}}" minlength="9" maxlength="9" placeholder="Kpp">
                </div>
            </div>
        </div>

        <div class="form-group for_organization">
            <div class="form-group">
                <input type="text" class="form-control" minlength="20" maxlength="20" name="ks" value="{{old('ks')}}" placeholder="k/s">
            </div>
        </div>

        <div class="row for_organization">
            <div class="col-sm">
                <div class="form-group">
                    <input type="text" class="form-control" maxlength="9" name="bik" value="{{old('bik')}}" placeholder="Bik">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <input type="text" class="form-control" maxlength="15" name="ogrn" value="{{old('ogrn')}}" placeholder="Ogrn">
                </div>
            </div>
        </div>

        <div class="form-group for_organization">
            <div class="form-group">
                <input type="text" class="form-control" name="address" value="{{old('address')}}" placeholder="Address">
            </div>
        </div>

        <div class="form-group for_organization">
            <div class="form-group">
                <input type="text" class="form-control" name="general_manager" value="{{old('bik')}}" placeholder="Fullname of general manager">
            </div>
        </div>

        <div class="form-group for_organization">
            <div class="form-group">
                <input type="text" class="form-control" name="position" value="{{old('position')}}" placeholder="Position of general manager">
            </div>
        </div>

        <div class="form-group for_organization">
            <div class="form-group">
                <input type="text" class="form-control" name="reason" value="{{old('reason')}}" placeholder="Reason">
            </div>
        </div>

        <div class="form-group">
            <div class="form-group">
                <input type="text" class="form-control" name="amount" value="{{old('amount') ?? 1}}" placeholder="Number of tickets">
            </div>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="agree" required>
                <label class="form-check-label" for="agree">I agree to the processing of personal data</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        @csrf
        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Continue</button>
    </div>
</form>
