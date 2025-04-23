<?php 
ob_start();
    include "../partials/header.php";
    include "../partials/nav.php";

    if(isPostRequest()){
        $firstname = getValue("firstname");
        $lastname = getValue("lastname");
        $email = getValue("email");
        $phone = getValue("phone");
        $organization = getValue("organization");
        $location = getValue("location");
        $birthday = getValue("birthday");
        $profile_image = $_FILES['profile_image'] ?? null;
        $password = null;

        if (getValue("password_1") === getValue("password_2")) {
            $password = getValue("password_1");
        } else {
            die("password dont matched");
        }

        $user = new User();
        $new_user = $user->register(
            $firstname,
            $lastname,
            $email,
            $password,
            $phone,
            $organization,
            $location,
            $birthday,
            $profile_image
        ) ;

        if ($new_user) {
            redirect("/pages/login.php");
        } else {
            echo "Registration Failed";
        }
    }
?>

    <!-- Main Content -->
    <main class="container my-5">
        <h2 class="text-center mb-4">Register</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post">
                    <div class="mb-3 d-flex w-100">
                        <div class="w-100">
                            <label for="fname" class="form-label">First Name *</label>
                            <input
                                type="text"
                                class="form-control"
                                id="fname"
                                name="firstname"
                                required
                            >
                        </div>
                        <div class="w-100 ms-4">
                            <label for="lname" class="form-label">Last Name *</label>
                            <input
                                type="text"
                                class="form-control"
                                id="lname"
                                name="lastname"
                                required
                            >
                        </div>
                    </div>
                    <div class="mb-3 w-100 d-flex">
                        <div class="w-100">
                            <label for="email" class="form-label">Email address *</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                required
                            >
                        </div>
                        <div class="w-100 ms-4">
                            <label for="phone" class="form-label">Phone number</label>
                            <input
                                type="number"
                                class="form-control"
                                name="phone"
                                id="phone"
                            >
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="organization" class="form-label">Organization</label>
                        <input
                            type="text"
                            class="form-control"
                            id="organization"
                            name="organization"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input
                            type="text"
                            class="form-control"
                            id="location"
                            name="location"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password *</label>
                        <input
                            type="password"
                            class="form-control"
                            id="password"
                            name="password_1"
                            required
                        >
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password" class="form-label">Confirm Password *</label>
                        <input
                            type="password"
                            class="form-control"
                            id="confirm-password"
                            name="password_2"
                            required
                        >
                    </div>
                    <div class="mb-3 w-100 d-flex">
                        <div class="w-100">
                            <label for="birthday" class="form-label">Birthday </label>
                            <input
                                type="date"
                                class="form-control"
                                id="birthday"
                                name="birthday"
                            >
                        </div>
                        <div class="w-100 ms-4">
                            <label for="profile_image" class="form-label">Profile image</label>
                            <input
                                type="file"
                                 accept="image/*"
                                class="form-control"
                                name="profile_image"
                                id="profile_image"
                            >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
                <p class="mt-3 text-center">
                    Already have an account? <a href="/pages/login.php">Login here</a>.
                </p>
            </div>
        </div>
    </main>

<?php 
    include "../partials/footer.php";
    ob_end_flush();
?>