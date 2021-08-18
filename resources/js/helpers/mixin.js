import Vue from "vue";
Vue.mixin({
    methods: {
        confirm: function(callback) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then(result => {
                if (result.isConfirmed) callback();
            });
        },
        loadThumnail: function(e) {
            let file = e.target.files[0];
            let reader = new FileReader();
            let a = this;
            reader.onload = function(e) {
                a.form.thumnail = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        fileLink: function(name) {
            return "uploads/posts/" + name;
        }
    }
});
