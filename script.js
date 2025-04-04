document.addEventListener("DOMContentLoaded", function() {
    fetch("../backend/dashboard.php")
        .then(response => response.json())
        .then(data => {
            const ctx = document.getElementById("bookChart").getContext("2d");
            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: data.map(item => item.title),
                    datasets: [{
                        label: "Books Borrowed",
                        data: data.map(item => item.value),
                        backgroundColor: ["#1abc9c", "#3498db", "#9b59b6", "#e74c3c", "#f1c40f"]
                    }]
                }
            });
        });
});
