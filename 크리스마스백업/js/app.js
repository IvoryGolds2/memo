const goMyTreeButton = document.querySelector(".goMyTree");

registerTab.addEventListener("click", () => {
  registerForm.style.display = "block";
  loginForm.style.display = "none";
  goMyTreeButton.style.display = "none"; // registerForm일 때 버튼 숨김
});

loginTab.addEventListener("click", () => {
  loginForm.style.display = "block";
  registerForm.style.display = "none";
  goMyTreeButton.style.display = "block"; // loginForm일 때 버튼 표시
});
document.addEventListener("DOMContentLoaded", function () {
  function checkUsernameDuplicate() {
    const usernameInput = document.getElementById("checkUsername");
    const username = usernameInput.value;

    if (!username) {
      alert("ID를 입력해주세요.");
      return;
    }
    const regex = /^[a-zA-Z0-9]+$/;
    if (!regex.test(username)) {
      alert("ID는 영어와 숫자로만 이루어져야 합니다.");
      return;
    }
    fetch("checkUsername.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `username=${username}`,
    })
      .then((response) => response.json())
      .then((data) => {
        const usernameStatus = document.getElementById("usernameStatus");
        if (data.isDuplicate) {
          alert("이미 사용 중인 ID입니다.");
          usernameStatus.classList.remove("valid");
          usernameStatus.classList.add("invalid");
          isUsernameChecked = false;
        } else {
          alert("사용 가능한 ID입니다.");
          usernameStatus.classList.remove("invalid");
          usernameStatus.classList.add("valid");
          isUsernameChecked = true;
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("중복 확인 중 오류가 발생했습니다.");
        isUsernameChecked = false;
      });
  }

  function sendData(url, formData) {
    fetch(url, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        alert(data.message);
        if (data.message === "Merry Christmas!") {
          window.location.href = `myChristmasTree.php`;
        }
        console.log(data);
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }

  const app = document.querySelector("#app");
  app.style.display = "block";
  const tabs = document.querySelectorAll(".tab");

  tabs.forEach((tab) => {
    tab.addEventListener("click", function () {
      tabs.forEach((innerTab) => innerTab.classList.remove("active"));
      tab.classList.add("active");
    });
  });

  const registerTab = document.getElementById("registerTab");
  const loginTab = document.getElementById("loginTab");
  const registerForm = document.getElementById("registerForm");
  const loginForm = document.getElementById("loginForm");
  const messageDiv = document.getElementById("message");

  registerForm.style.display = "block";
  loginForm.style.display = "none";

  registerTab.addEventListener("click", () => {
    registerForm.style.display = "block";
    loginForm.style.display = "none";
  });

  loginTab.addEventListener("click", () => {
    loginForm.style.display = "block";
    registerForm.style.display = "none";
  });

  let isUsernameChecked = false;

  registerForm.addEventListener("submit", function (e) {
    e.preventDefault();

    // 중복 확인이 성공적으로 되었는지 확인
    if (!isUsernameChecked) {
      alert("ID 중복 확인을 해주세요.");
      return;
    }

    // 비밀번호와 비밀번호 확인이 일치하는지 확인
    const password = registerForm.querySelector('[name="password"]').value;
    const passwordConfirm = registerForm.querySelector(
      '[name="passwordConfirm"]'
    ).value;

    if (password !== passwordConfirm) {
      alert("비밀번호가 일치하는지 확인해주세요");
      return;
    }

    sendData("register.php", new FormData(registerForm));
  });

  loginForm.addEventListener("submit", function (e) {
    e.preventDefault();
    sendData("login.php", new FormData(loginForm));
  });

  document
    .getElementById("checkDuplicate")
    .addEventListener("click", checkUsernameDuplicate);
});
