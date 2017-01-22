# Buras
### 개발 정보
  * 언어 : html, css, Javascript, php(7.0)
  * 프레임워크 : CodeIgniter (3.x)
  * 데이터베이스 : MariaDB(10.0.x)


### 개발자
  * @[devhwi](https://github.com/devhwi)


### 진행 상황
  * 2017.01.02 : 요구사항 정리 및 플랜 작성
  * 2017.01.03 : DB 설계
  * 2017.01.04 : 화면 설계
  * 2017.01.05 : DB 설계 완료
  * 2017.01.09 : 로그인 화면 및 메인 화면
  * 2017.01.10 : 회원가입
  * 2017.01.11 : 의류 전체 보기 및 검색, 의류 상세 보기 및 품번별 대여 현황, 렌탈 등록
  * 2017.01.12 : 나의 렌탈 현황 보기
  * 2017.01.15 : 멤버 보기, 멤버 검색(이름, 기수)
  * 2017.01.16 : 게시판 리스트 뷰
  * 2017.01.17 : 게시판 리스트 뷰 마무리
  * 2017.01.18 : 게시판 상세 & 댓글, 관리자 로그인
  * 2017.01.19 : 관리자 메뉴 정비, 회원 관리 & 검색
  * 2017.01.20 : 관리자 메뉴 - 물품 카테고리 관리(보기, 추가, 삭제)
  * 2017.01.21 : 관리자 메뉴 - 물품 리스트(보기, 검색)
  * 2017.01.22 : 관리자 메뉴 - 물품 리스트(삭제)

### 화면 구성
  ```
  사용자화면
  ```
  * 로그인 : 접속 시 초기화면
    * 회원가입 : 사용자 등록 화면. 가입 후 관리자 승인이 있어야 이용 가능
  * 메인 : (승인된 사용자의)로그인 후 초기화면
  * 멤버
    * 멤버 보기
      * 멤버 검색
  * 렌탈 : 의류 대여에 관한 메뉴
    * 의류 보기
      * 의류 검색 (속성별 검색)
      * 의류 상세 -> 대여 가능 의류 확인 -> 대여 신청
    * 렌탈 현황(나의 렌탈)
  * 게시판
    * 공지사항
    * 회계보고
    * 문서창고
    * 자료실
  * 미디어
    * 사진첩
    * 영상(유투브 링크)


```
관리자화면
비회원 : 0 / 정회원 : 1 / 렌탈관리자 : 8 / 회계관리자 : 9 / 웹마스터 : 10
```
  관리자 권한을 가진 사용자만 접속이 가능합니다.<br>
  * 사용자화면 모두 개발 후에 시작
  * 회원 관리 (최고 관리자)
    * 회원 리스트
      * 회원 수정
      * 회원 삭제
  * 게시판 관리 (최고 관리자)
    * 카테고리 관리
    * 게시물 관리
    * 댓글 관리
    * 공지사항
  * 물품 관리 (렌탈관리자, 최고 관리자)
    * 카테고리 관리
    * 물품 리스트
      * 물품 추가
      * 물품 수정
      * 물품 삭제
  * 렌탈 관리 (렌탈 관리자, 최고 관리자)
    * 렌탈 현황 -> 반납 처리, 취소 처리
  * 회계 관리 (회계 관리자, 최고 관리자)
    * 납부 현황 -> 납부 처리
