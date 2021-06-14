@if('message')
{{ $message }}
@endif
<h4>Price Per Page</h4>
<form wire:submit.prevent="save">
    <label for="">Price Per Page: </label>
    <input type="number" wire:model="new_price" value="{{ $price->total_price }}" required>
    <input type="submit" class="btn btn-primary btn-sm" value="Save">
</form>
