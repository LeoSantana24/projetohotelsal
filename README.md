## Tabela: users

| id | name     | email              | phone         | país     | usertype | email_verified_at     | password   | two_factor_secret | two_factor_recovery_codes | two_factor_confirmed_at | remember_token | current_team_id | profile_photo_path        | created_at          | updated_at          |
|----|----------|--------------------|---------------|----------|----------|------------------------|------------|--------------------|---------------------------|--------------------------|----------------|------------------|---------------------------|---------------------|---------------------|
| 1  | João     | joao@exemplo.com   | 912345678     | Portugal | admin    | 2024-01-05 10:15:00    | 12345678    | NULL               | NULL                      | NULL                     | NULL           | NULL             | /images/users/joao.png    | 2024-01-01 09:00:00 | 2024-01-10 12:00:00 |
| 2  | Maria    | maria@exemplo.com  | 913456789     | Brasil   | guia     | 2024-01-10 14:30:00    | senha123    | NULL               | NULL                      | NULL                     | NULL           | NULL             | /images/users/maria.png   | 2024-01-02 10:00:00 | 2024-01-12 13:00:00 |
| 3  | Carlos   | carlos@exemplo.com | 914567890     | Angola   | turista  | NULL                   | pass1234    | NULL               | NULL                      | NULL                     | NULL           | NULL             | /images/users/carlos.png  | 2024-01-03 11:00:00 | 2024-01-15 15:00:00 |

Perfeito! Aqui estão as demais tabelas do seu banco de dados `.sql`, com **campos como colunas** e **dados fictícios como conteúdo**, em formato Markdown para usar no seu README:

---

| id | room\_id | name        | email                                     | phone     | status    | start\_date | end\_date  | number\_adults | number\_children | created\_at         | updated\_at         |
| -- | -------- | ----------- | ----------------------------------------- | --------- | --------- | ----------- | ---------- | -------------- | ---------------- | ------------------- | ------------------- |
| 1  | 2        | João Silva  | [joao@email.com](mailto:joao@email.com)   | 912345678 | waiting   | 2025-05-10  | 2025-05-12 | 2              | 1                | 2025-05-01 10:00:00 | 2025-05-01 10:00:00 |
| 2  | 1        | Maria Souza | [maria@email.com](mailto:maria@email.com) | 934567890 | confirmed | 2025-06-01  | 2025-06-03 | 1              | 0                | 2025-05-02 11:00:00 | 2025-05-02 11:00:00 |


| id | type\_massage\_id | name          | email                                     | phone     | date       | hour  | created\_at         | updated\_at         | duration |
| -- | ----------------- | ------------- | ----------------------------------------- | --------- | ---------- | ----- | ------------------- | ------------------- | -------- |
| 1  | 1                 | Pedro Martins | [pedro@email.com](mailto:pedro@email.com) | 911112223 | 2025-05-15 | 14:00 | 2025-05-01 12:00:00 | 2025-05-01 12:00:00 | 60min    |
| 2  | 2                 | Ana Lopes     | [ana@email.com](mailto:ana@email.com)     | 922334455 | 2025-05-16 | 10:30 | 2025-05-02 13:00:00 | 2025-05-02 13:00:00 | 90min    |


| id | name            | icon\_class  | created\_at         | updated\_at         |
| -- | --------------- | ------------ | ------------------- | ------------------- |
| 1  | Wi-Fi           | fa-wifi      | 2025-04-01 09:00:00 | 2025-04-01 09:00:00 |
| 2  | Ar Condicionado | fa-snowflake | 2025-04-01 09:00:00 | 2025-04-01 09:00:00 |


### 🧩 Tabela: `feature_room`

| id | room\_id | feature\_id | created\_at         | updated\_at         |
| -- | -------- | ----------- | ------------------- | ------------------- |
| 1  | 1        | 1           | 2025-04-10 08:00:00 | 2025-04-10 08:00:00 |
| 2  | 1        | 2           | 2025-04-10 08:05:00 | 2025-04-10 08:05:00 |
| 3  | 2        | 1           | 2025-04-11 09:00:00 | 2025-04-11 09:00:00 |

---

### 🖼️ Tabela: `galleries`

| id | image        | created\_at         | updated\_at         |
| -- | ------------ | ------------------- | ------------------- |
| 1  | gallery1.jpg | 2025-04-01 08:00:00 | 2025-04-01 08:00:00 |
| 2  | gallery2.jpg | 2025-04-02 09:30:00 | 2025-04-02 09:30:00 |

---

### 🛏️ Tabela: `rooms`

| id | room\_title     | description         | price | room\_type | created\_at         | updated\_at         |
| -- | --------------- | ------------------- | ----- | ---------- | ------------------- | ------------------- |
| 1  | Quarto Deluxe   | Vista para o mar    | 120   | casal      | 2025-03-20 10:00:00 | 2025-03-20 10:00:00 |
| 2  | Suíte Executiva | Ideal para negócios | 200   | suíte      | 2025-03-21 10:30:00 | 2025-03-21 10:30:00 |

---

### 🏠 Tabela: `room_images`

| id | room\_id | image       | created\_at         | updated\_at         |
| -- | -------- | ----------- | ------------------- | ------------------- |
| 1  | 1        | deluxe1.jpg | 2025-04-01 10:00:00 | 2025-04-01 10:00:00 |
| 2  | 1        | deluxe2.jpg | 2025-04-01 10:05:00 | 2025-04-01 10:05:00 |
| 3  | 2        | suite1.jpg  | 2025-04-02 11:00:00 | 2025-04-02 11:00:00 |

---

### 💆 Tabela: `type_massage`

| id | massage\_title | image       | description              | price | created\_at         | updated\_at         |
| -- | -------------- | ----------- | ------------------------ | ----- | ------------------- | ------------------- |
| 1  | Relaxante      | relax.jpg   | Alivia o estresse        | 60    | 2025-04-05 14:00:00 | 2025-04-05 14:00:00 |
| 2  | Terapêutica    | terapia.jpg | Foca em dores musculares | 80    | 2025-04-06 15:00:00 | 2025-04-06 15:00:00 |

---

### 👤 Tabela: `users`

| id | name        | email                                     | phone     | país     | usertype | email\_verified\_at | password            | two\_factor\_secret | two\_factor\_recovery\_codes | two\_factor\_confirmed\_at | remember\_token | current\_team\_id | profile\_photo\_path | created\_at         | updated\_at         |
| -- | ----------- | ----------------------------------------- | --------- | -------- | -------- | ------------------- | ------------------- | ------------------- | ---------------------------- | -------------------------- | --------------- | ----------------- | -------------------- | ------------------- | ------------------- |
| 1  | Admin Hotel | [admin@hotel.com](mailto:admin@hotel.com) | 912345678 | Portugal | admin    | 2025-04-01 10:00:00 | \$2y\$10\$abc123... | NULL                | NULL                         | NULL                       | NULL            | NULL              | /photos/admin.jpg    | 2025-04-01 10:00:00 | 2025-04-01 10:00:00 |
| 2  | Ana Cliente | [ana@cliente.com](mailto:ana@cliente.com) | 934567890 | Brasil   | turista  | 2025-04-02 11:00:00 | \$2y\$10\$def456... | NULL                | NULL                         | NULL                       | NULL            | NULL              | /photos/ana.jpg      | 2025-04-02 11:00:00 | 2025-04-02 11:00:00 |

---

Se quiser, posso juntar tudo em um único arquivo `README.md` completo para você. Deseja isso?

