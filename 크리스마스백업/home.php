<!DOCTYPE html>
<html lang="ko">
<head>
<?php 
include './front_header.php';
?>
</head>
<body class="homeBG">
    <img class="bearImg" src="./img/main_img.png" alt="">
    <div id="app" style="display:none;">
        <div class="tabs">
            <button class="tab" id="registerTab">회원가입</button>
            <button class="tab" id="loginTab">로그인</button>
        </div>

        <!-- 회원가입 폼 -->
        <form id="registerForm" class="homeform">
            <div>
                닉네임<input type="text" name="nickname" autocomplete='off' required><br>
            </div>
            <div>
                ID
                <input type="text" id="checkUsername" name="username" autocomplete='off' required>
                <button type="button" id="checkDuplicate">중복 확인</button>
                <span id="usernameStatus"></span><br>
            </div>
            <div>
                비밀번호<input type="password" name="password" autocomplete='off' required><br>
            </div>
            <div>
                <span class="pwck">비밀번호 확인</span>
                <input type="password" name="passwordConfirm" autocomplete='off' required>
            </div>
            <button class="submitBtn" type="submit">회원가입</button>
        </form>

        <!-- 로그인 폼 -->
        <form id="loginForm" class="homeform">
            <div>
                아이디<input type="text" name="username" autocomplete='off' required>
            </div>
            <div>
                비밀번호<input type="password" name="password" autocomplete='off' required>
            </div>
        </form>
        <div id="message"></div>
    </div>
    <a href="./out.php" class="out">탈퇴하기</a>
    <button class="goMyTree" form="loginForm">내 크리스마스트리 보러가기!</button>


</body>
<script>
    const app = document.querySelector("#app");
    app.style.display = "block";
    

    // 탭버튼
    const tabs = document.querySelectorAll('.tab'); // 탭 (회원가입, 로그인)
    const homeforms = document.querySelectorAll('.homeform'); // 폼
    const goMyTree = document.querySelector('.goMyTree'); // 트리이동버튼
    tabs[0].classList.add('active');
    homeforms[0].classList.add('active');
    tabs.forEach((tab, index) => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            homeforms.forEach(h => h.classList.remove('active'));
            tab.classList.add('active');
            homeforms[index].classList.add('active');
            if(index == 1){
                goMyTree.classList.add('active');
            }else{
                goMyTree.classList.remove('active');
                
            }
        });
    });

    
    // 로그인 정보가 저장되어있다면
    if(localStorage.getItem('id')){
        tabs[0].classList.remove('active');
        tabs[1].classList.add('active');
        homeforms[0].classList.remove('active');
        homeforms[1].classList.add('active');
        goMyTree.classList.add('active');
        
        const login_id = document.querySelector('#loginForm input[name="username"]');
        const login_pw = document.querySelector('#loginForm input[name="password"]');
        login_id.value = localStorage.getItem('id'); // id
        login_pw.value = localStorage.getItem('pswd'); // nick
        
        // sendData('login.php', new FormData(loginForm)); // 자동로그인
    }


    // id 체크
    const usernameInput = registerForm.querySelector('[name="username"]');
    usernameInput.addEventListener('input', function () {
        const username = usernameInput.value;
        if (username.length > 20) {
            alert('ID는 20자 이내로 입력해주세요.');
        }
    });

    // 닉네임 체크
    const nicknameInput = registerForm.querySelector('[name="nickname"]');
    nicknameInput.addEventListener('input', function () {
        const nickname = nicknameInput.value;
        if (nickname.length > 10) {
            alert('닉네임은 10자 이내로 입력해주세요.');
        }
    });

    const passwordForStorage = registerForm.querySelector('[name="password"]');
    


    document.addEventListener('DOMContentLoaded', function() {
        function checkUsernameDuplicate() {
            const usernameInput = document.getElementById('checkUsername');
            const username = usernameInput.value;
            
            if (!username) {
                alert('ID를 입력해주세요.');
                return;
            }
            const regex = /^[a-zA-Z0-9]+$/;
            if (!regex.test(username)) {
                alert('ID는 영어와 숫자로만 이루어져야 합니다.');
                return;
            }
            fetch('checkUsername.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `username=${username}`,
            })
            .then(response => response.json())
            .then(data => {
                const usernameStatus = document.getElementById('usernameStatus');
                if (data.isDuplicate) {
                    alert('이미 사용 중인 ID입니다.');
                    usernameStatus.classList.remove('valid');
                    usernameStatus.classList.add('invalid');
                    isUsernameChecked = false;
                } else {
                    alert('사용 가능한 ID입니다.');
                    usernameStatus.classList.remove('invalid');
                    usernameStatus.classList.add('valid');
                    isUsernameChecked = true;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('중복 확인 중 오류가 발생했습니다.');
                isUsernameChecked = false;
            });
        }

        let isUsernameChecked = false;

        // -- 회원가입
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // 중복 확인이 성공적으로 되었는지 확인
            if (!isUsernameChecked) {
                alert('ID 중복 확인을 해주세요.');
                return;
            }
        
            // 비밀번호와 비밀번호 확인이 일치하는지 확인
            const password = registerForm.querySelector('[name="password"]').value;
            const passwordConfirm = registerForm.querySelector('[name="passwordConfirm"]').value;

            if (password !== passwordConfirm) {
                alert('비밀번호가 일치하는지 확인해주세요');
                return;
            }

            // 비밀번호 유효성 검사
            const regexPassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,16}$/;
            if (!regexPassword.test(password)) {
                alert('비밀번호는 영어와 숫자가 포함된 조합으로 6-16자 사이로 입력해주세요.');
                return;
            }




            saveData('1');
            sendData('register.php', new FormData(registerForm));
        });

        // -- 로그인
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            saveData('2');
            sendData('login.php', new FormData(loginForm));
        });

        document.getElementById('checkDuplicate').addEventListener('click', checkUsernameDuplicate);




        // 로컬스토리지값 저장
        function saveData(n){
            const register_id = document.querySelector('#registerForm input[name="username"]');
            const register_pw = document.querySelector('#registerForm input[name="password"]');
            const login_id = document.querySelector('#loginForm input[name="username"]');
            const login_pw = document.querySelector('#loginForm input[name="password"]');
            if(n == 1){ // 회원가입 > 로그인 정보에 저장
                localStorage.setItem('id', register_id.value);
                localStorage.setItem('pswd', register_pw.value);
                login_id.value = localStorage.getItem('id'); // id
                login_pw.value = localStorage.getItem('pswd'); // nick
            }
            if(n == 2){ // 로그인 > 로그인 정보에 저장
                localStorage.setItem('id', login_id.value);
                localStorage.setItem('pswd', login_pw.value);
            }
        }



    });

    

    function sendData(url, formData) {
        fetch(url, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.message === "Merry Christmas!") {
                const user = loginForm.querySelector('[name="username"]').value;
                window.location.href = `myChristmasTree.php?user=${user}`;
            } else if (data.message === "회원가입 성공!") {
                // 회원가입이 성공하면 새로고침 후 로그인 탭으로 전환
                loginTab.click(); // 로그인 탭으로 전환
            }
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }




</script>
<script src="./js/postData.js"></script>
</html>
