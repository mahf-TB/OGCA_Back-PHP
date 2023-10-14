<template>
    <div class="container footer">
        <footer class="d-flex flex-wrap justify-content-between align-items-center  border-top">
            <p class="col-md-4 mb-0 text-muted">&copy; 2022 Company, Inc</p>

            <a href="/"
                class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
            </ul>
        </footer>
    </div>
    <!-- <footer class="footer ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 d-flex justify-content-start align-items-center">
                    <nav class="nav-bar">
                        <ul class="m-0 p-0">
                            <li>
                                <a href="#" class="link">
                                    Tableau de bord
                                </a>
                            </li>
                            <li>
                                <a href="#" class="link">
                                    Avancement
                                </a>
                            </li>
                            <li>
                                <a href="#" class="link">
                                    Contractuel
                                </a>
                            </li>
                            <li>
                                <a href="#" class="link">
                                    Retraité
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>
                <div class="col-md-6">
                    <p class="copyright d-flex justify-content-end align-items-center "> copy 2023 Design by
                        <a class="nav-link">Zifukoro TB</a> Gestion des Rappel et des Notification
                    </p>
                </div>
            </div>
        </div>
    </footer> -->
</template>

<script>
export default {
    name: 'FooterBar'
}
</script>

<style>
.link {
    color: #000;
}

.link:hover {
    color: #034a17;
}</style>