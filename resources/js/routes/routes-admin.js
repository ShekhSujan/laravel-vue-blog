import home from "../components/backend/home";

import newcategory from "../components/backend/category/create";
import editcategory from "../components/backend/category/edit";
import categories from "../components/backend/category/manage";

import newpost from "../components/backend/post/create";
import editpost from "../components/backend/post/edit";
import posts from "../components/backend/post/manage";
import NotFound from "../components/backend/blank";

export const routes = [
    { path: "/admin", component: home },

    { path: "/admin/create-category", component: newcategory },
    { path: "/admin/edit-category/:id", component: editcategory },
    { path: "/admin/categories", component: categories },

    { path: "/admin/create-post", component: newpost },
    { path: "/admin/edit-post/:slug", component: editpost },
    { path: "/admin/posts", component: posts }
];
