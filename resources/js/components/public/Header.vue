<template>
    <div>
        <header class="header-style-1">
            <div class="main-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                            <div class="logo">
                                <a href="home.html">
                                    <img src="images/logo.png" alt="" />
                                </a>
                            </div>
                        </div>

                        <div
                            class="col-xs-12 col-sm-12 col-md-7 top-search-holder"
                        >
                            <div class="search-area">
                                <form>
                                    <div class="control-group">
                                        <ul
                                            class="categories-filter animate-dropdown"
                                        >
                                            <li class="dropdown">
                                                <a
                                                    class="dropdown-toggle"
                                                    data-toggle="dropdown"
                                                    href="category.html"
                                                    >Categories
                                                    <b class="caret"></b
                                                ></a>

                                                <ul
                                                    class="dropdown-menu"
                                                    role="menu"
                                                >
                                                    <li class="menu-header">
                                                        Computer
                                                    </li>
                                                    <li role="presentation">
                                                        <a
                                                            role="menuitem"
                                                            tabindex="-1"
                                                            href="category.html"
                                                            >- Clothing</a
                                                        >
                                                    </li>
                                                    <li role="presentation">
                                                        <a
                                                            role="menuitem"
                                                            tabindex="-1"
                                                            href="category.html"
                                                            >- Electronics</a
                                                        >
                                                    </li>
                                                    <li role="presentation">
                                                        <a
                                                            role="menuitem"
                                                            tabindex="-1"
                                                            href="category.html"
                                                            >- Shoes</a
                                                        >
                                                    </li>
                                                    <li role="presentation">
                                                        <a
                                                            role="menuitem"
                                                            tabindex="-1"
                                                            href="category.html"
                                                            >- Watches</a
                                                        >
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>

                                        <input
                                            class="search-field"
                                            placeholder="Search here..."
                                        />

                                        <a class="search-button" href="#"></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-nav animate-dropdown">
                <div class="container">
                    <div class="yamm navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                            <button
                                data-target="#mc-horizontal-menu-collapse"
                                data-toggle="collapse"
                                class="navbar-toggle collapsed"
                                type="button"
                            >
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="nav-bg-class">
                            <div
                                class="navbar-collapse collapse"
                                id="mc-horizontal-menu-collapse"
                            >
                                <div class="nav-outer">
                                    <ul class="nav navbar-nav">
                                        <li class="active yamm-fw">
                                            <router-link to="/"
                                                >Home</router-link
                                            >
                                        </li>
                                        <li class=" yamm-fw">
                                            <router-link to="/about"
                                                >About</router-link
                                            >
                                        </li>
                                        <li
                                            class=" yamm-fw"
                                            v-for="category in categories"
                                            :key="category.id"
                                        >
                                            <router-link
                                                :to="
                                                    `/category/${category.slug}`
                                                "
                                                >{{
                                                    category.name
                                                }}</router-link
                                            >
                                        </li>
                                    </ul>
                                    <!-- /.navbar-nav -->
                                    <div class="clearfix"></div>
                                </div>
                                <!-- /.nav-outer -->
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.nav-bg-class -->
                    </div>
                    <!-- /.navbar-default -->
                </div>
                <!-- /.container-class -->
            </div>
        </header>
    </div>
</template>

<script>
export default {
    name: "Header",
    data: function() {
        return {};
    },
    mounted() {
        this.$store.dispatch("activeCategories");
    },
    computed: {
        categories() {
            return this.$store.getters.activeCategories;
        }
    }
};
</script>
