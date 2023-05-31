<template>
    <div>
        <sidebar-component />
        <header-component />
        <div class="page-wrapper">
            <!--wrapper-->
            <!--start page wrapper -->
            <div class="page-content">
                <div class="row row-cols-1 row-cols-lg-3">
                    <!-- Time Start-->
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <p class="mb-0">Time Start</p>
                                        <h5 class="font-weight-bold">
                                            34m 14s
                                        </h5>
                                        <p class="text-secondary mb-0 font-13">
                                            Analytics for last week
                                        </p>
                                    </div>
                                    <div
                                        class="widgets-icons bg-gradient-lush text-white"
                                    >
                                        <i class="bx bx-time"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Time Start End-->
                    <!-- Time End-->
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <p class="mb-0">Time End</p>
                                        <h5 class="font-weight-bold">
                                            34m 14s
                                        </h5>
                                        <p class="text-secondary mb-0 font-13">
                                            Analytics for last week
                                        </p>
                                    </div>
                                    <div
                                        class="widgets-icons bg-gradient-cosmic text-white"
                                    >
                                        <i class="bx bx-time"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Time End End-->
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <p class="mb-0">Number of Candidates</p>
                                        <h6 class="font-weight-bold">
                                            8 Candidates
                                        </h6>
                                        <p class="text-secondary mb-0 font-13">
                                            Analytics for last week
                                        </p>
                                    </div>
                                    <div
                                        class="widgets-icons bg-gradient-burning text-white"
                                    >
                                        <i class="bx bx-group"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <p class="mb-0">Number of Voters</p>
                                        <h5 class="font-weight-bold">
                                            10 Users
                                        </h5>
                                        <p class="text-secondary mb-0 font-13">
                                            already voted
                                        </p>
                                    </div>
                                    <div
                                        class="widgets-icons bg-gradient-kyoto text-white"
                                    >
                                        <i class="bx bx-check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <p class="mb-0">Number of Voters</p>
                                        <h5 class="font-weight-bold">
                                            5 Users
                                        </h5>
                                        <p class="text-secondary mb-0 font-13">
                                            haven't voted yet
                                        </p>
                                    </div>
                                    <div
                                        class="widgets-icons bg-gradient-blues text-white"
                                    >
                                        <i class="bx bx-x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div id="chart1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div id="chart2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
                <div class="row row-cols-1 row-cols-lg-3">
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div id="chart4"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div id="chart5"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div id="chart6"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style>
* {
    text-decoration: none;
    margin: 0px;
    padding: 0px;
}

body {
    margin: 0px;
    padding: 0px;
    font-family: "Open Sans", sans-serif;
}

.wrapper {
    width: 1100px;
    margin: auto;
    position: relative;
}

.logo a {
    font-size: 50px;
    font-weight: 800;
    float: left;
    font-family: courier;
    color: #364f6b;
}

section {
    margin: auto;
    display: flex;
    margin-bottom: 50px;
}

.kolom {
    margin-top: 50px;
    margin-bottom: 50px;
}

.kolom .deskripsi {
    font-size: 20px;
    font-weight: bold;
    font-family: "comic sans ms";
    color: #364f6b;
}

a.tbl-biru {
    background: #3f72af;
    border-radius: 20px;
    margin-top: 20px;
    padding: 15px 20px 15px 20px;
    color: #ffffff;
    cursor: pointer;
    font-weight: bold;
}

a.tbl-biru:hover {
    background: #fc5185;
    text-decoration: none;
}

a.tbl-pink {
    background: #fc5185;
    border-radius: 20px;
    margin-top: 20px;
    padding: 15px 20px 15px 20px;
    color: #ffffff;
    cursor: pointer;
    font-weight: bold;
}

a.tbl-pink:hover {
    background: #3f72af;
    text-decoration: none;
}

@media screen and (max-width: 991.98px) {
    .wrapper {
        width: 90%;
    }

    .logo a {
        display: block;
        width: 100%;
        text-align: center;
    }

    section {
        display: block;
    }

    section img {
        display: block;
        width: 100%;
        height: auto;
    }
}
</style>
