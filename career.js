document.addEventListener("DOMContentLoaded", () => {
    // Array of job openings
    const jobOpenings = [
        {
            image: "https://p.turbosquid.com/ts-thumb/Hw/tlqDzk/cO/cuterobot_0000/jpg/1622119901/1920x1080/fit_q87/481d5a83e0ca5b76285fdfd2d73afa57aaf52785/cuterobot_0000.jpg",
            title: "Unity Game Developer",
            description: "Develop immersive 3D gaming experiences using Unity.",
        },
        {
            image: "https://p.turbosquid.com/ts-thumb/Hw/tlqDzk/cO/cuterobot_0000/jpg/1622119901/1920x1080/fit_q87/481d5a83e0ca5b76285fdfd2d73afa57aaf52785/cuterobot_0000.jpg",
            title: "Gameplay Programmer",
            description: "Implement gameplay features and mechanics for new games.",
        },
        {
            image: "https://p.turbosquid.com/ts-thumb/Hw/tlqDzk/cO/cuterobot_0000/jpg/1622119901/1920x1080/fit_q87/481d5a83e0ca5b76285fdfd2d73afa57aaf52785/cuterobot_0000.jpg",
            title: "UI/UX Designer",
            description: "Design intuitive and appealing interfaces for game users.",
        },
        {
            image: "https://p.turbosquid.com/ts-thumb/Hw/tlqDzk/cO/cuterobot_0000/jpg/1622119901/1920x1080/fit_q87/481d5a83e0ca5b76285fdfd2d73afa57aaf52785/cuterobot_0000.jpg",
            title: "Backend Developer",
            description: "Build scalable backend systems for multiplayer functionality.",
        }
    ];

    // Target container for job openings
    const jobContainer = document.querySelector(".job-container");

    // Loop through each job and create HTML for each job card
    jobOpenings.forEach(job => {
        const jobCard = document.createElement("div");
        jobCard.classList.add("job-card");

        jobCard.innerHTML = `
            <img src="${job.image}" alt="${job.title}">
            <h3>${job.title}</h3>
            <p>${job.description}</p>
            <button class="apply-button">Apply</button>
        `;
        jobContainer.appendChild(jobCard);
    });

    // Modal logic for "Apply" button
    const modal = document.getElementById("modal");
    const closeBtn = document.querySelector(".close-btn");

    // Show modal when any "Apply" button is clicked
    document.querySelectorAll(".apply-button").forEach(button => {
        button.addEventListener("click", () => {
            modal.style.display = "flex";
        });
    });

    // Close modal when close button is clicked
    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

    // Close modal when clicking outside the modal content
    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});

