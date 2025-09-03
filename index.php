<?php include('layout/header.php'); ?>

<div class="container mt-5">
    <h1>✨ Descubra qual é o seu signo ✨</h1>

    <form id="signo-form" method="POST" action="show_zodiac_sign.php">
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">📅 Data de Nascimento</label>
            <input 
                type="date" 
                class="form-control" 
                id="data_nascimento" 
                name="data_nascimento" 
                required
            >
        </div>
        <button type="submit" class="btn">🔮 Descobrir Meu Signo</button>
    </form>
</div>

<?php include('layout/footer.php'); ?>
