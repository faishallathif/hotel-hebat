<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-brown">
        <div class="container-fluid">
            <a class="navbar-brand judul-navbar fw-bold" href="#"
                >HOTEL HEBAT</a
            >
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse d-flex justify-content-end"
                id="navbarNavAltMarkup"
            >
                <div class="navbar-nav">
                    <button
                        type="button"
                        class="btn btn-success me-2 btn-navbar"
                    >
                        <a href="/home" class="text-decoration-none text-white"
                            >Home</a
                        >
                    </button>
                    <button
                        type="button"
                        class="btn btn-success me-2 btn-navbar"
                    >
                        <a href="/path" class="text-decoration-none text-white"
                            >Kamar</a
                        >
                    </button>
                    <button
                        type="button"
                        class="btn btn-success me-2 btn-navbar"
                    >
                        <a href="/about" class="text-decoration-none text-white"
                            >Fasilitas</a
                        >
                    </button>
                    <img
                        src="../assets/profile.png"
                        alt=""
                        style="width: 38px; height: 38px"
                        class="ml-2"
                    />
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
export default {};
</script>

<style scoped>
.btn-navbar {
    border-radius: 20px;
    background-color: brown;
    border: 0;
    width: 100px;
}
.bg-brown {
    background: linear-gradient(134.85deg, #917959, #917959);
}
.judul-navbar {
    color: #ffb03a !important;
    font-size: 28px;
}
</style>
