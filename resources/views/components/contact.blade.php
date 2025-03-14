<!-- resources/views/components/contact.blade.php -->
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        @error('email')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="message">Mensaje:</label>
                        <textarea name="message" class="form-control" required>{{ old('message') }}</textarea>
                        @error('message')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
<script>
document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        let alert = document.querySelector('.alert');
        if (alert) {
            alert.style.transition = "opacity 1s";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 1000);
        }
    }, 3000);
});
</script>
