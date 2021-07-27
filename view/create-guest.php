<div class="container mt-4">
    <div class="guest-link-container" id="guest-link-container">
        <a class="btn btn-primary guest-link" id="show-guest-list">Show Guest</a>
        <a class="btn btn-primary guest-link" id="add-new-guest">Add Guest</a>
        <a class="btn btn-primary guest-link" id="guest-requests">Guest Requests</a>
    </div>
    <div class="guest-show-details mt-4" id="show-guest-link-action">
        <form action="" class="form-request" id="form-request">
        <div class="form-group">
            <label for="phone">Guest Phone Number</label>
            <input type="number" class="form-control" placeholder="Guest Phone number" id="phone" required>
        </div>
        <div class="form-gorup">
            <label for="request">Guest Request</label>
            <textarea name="" cols="30" rows="10" class="form-control" id="request" placeholder="Enter Guest Request"></textarea>
        </div>
        <div class="text-center" id="show-request-status">
            
        </div>
        <div class="form-group text-right mt-2">
            <button class="btn btn-primary" type="submit" id="submit-request">Submit Request</button>
        </div>
        </form>
    </div>
</div>