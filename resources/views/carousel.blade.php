<div class="carousel-container">
    <div class="carousel">
        <div class="carousel-item">
            <div class="ad-item bg-blue-50 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-blue-700">Empréstimos Rápidos</h3>
                <p>Aproveite as melhores taxas de juros e condições de pagamento. Solicite seu empréstimo agora!</p>
                <a href="{{ route('emprestimos.index') }}" class="text-blue-500 hover:text-blue-700">Saiba Mais</a>
            </div>
        </div>
        <div class="carousel-item">
            <div class="ad-item bg-green-50 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-green-700">Cartões sem Anuidade</h3>
                <p>Solicite seu cartão de crédito sem anuidade e aproveite diversos benefícios exclusivos.</p>
                <a href="{{ route('cartao.index') }}" class="text-green-500 hover:text-green-700">Confira Agora</a>
            </div>
        </div>
        <div class="carousel-item">
            <div class="ad-item bg-yellow-50 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-yellow-700">Empréstimos com Taxas Especiais</h3>
                <p>Faça um empréstimo com taxas reduzidas e prazos flexíveis. Não perca!</p>
                <a href="{{ route('emprestimos.index') }}" class="text-yellow-500 hover:text-yellow-700">Solicite Já</a>
            </div>
        </div>
        <div class="carousel-item">
            <div class="ad-item bg-red-50 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-red-700">Cartões com Benefícios Exclusivos</h3>
                <p>Adquira um cartão de crédito com cashback e descontos em lojas parceiras.</p>
                <a href="{{ route('cartao.index') }}" class="text-red-500 hover:text-red-700">Peça o Seu</a>
            </div>
        </div>
    </div>
    <button class="carousel-prev">‹</button>
    <button class="carousel-next">›</button>
</div>
@section('css')
    <link rel="stylesheet" href="{{ asset('resources/css/dashboard/dashboard.css') }}">
@endsection

@section('js')
    <script src="{{ asset('resources/js/dashboard/dashboard.js') }}"></script>
@endsection
