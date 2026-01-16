# 📐 Hoja de Diseño - Newcom Argentina V2.0

> Documentación de los tres diseños de landing page para Newcom Argentina.
> Última actualización: 16 de enero de 2026

---

## 📁 Estructura de Archivos

| Archivo | Nombre del Diseño | Estilo Visual |
|---------|-------------------|---------------|
| `index.html` | **Dark / Hacker** | Futurista, Palantir-like, efectos neón |
| `index2.html` | **Light / Corporate** | Corporativo claro, profesional, limpio |
| `index3.html` | **Modern Enterprise Tech** | Vercel/Linear/Stripe Dark Mode |

---

## 🎨 DISEÑO 1: Dark / Hacker (`index.html`)

### Concepto
Estética futurista tipo "centro de control de operaciones". Inspirado en Palantir y dashboards de ciberseguridad.

### Paleta de Colores
```
Fondo Principal:    #000000 (Negro puro)
Primario:           #0066FF (Azul eléctrico)
Navy Deep:          #001E3C (Azul navy profundo)
Acentos:            Neón cyan, verde terminal
```

### Características Visuales
- ✅ **Scanlines** - Efecto de monitor CRT sobre elementos
- ✅ **Glassmorphism** - Paneles con `backdrop-blur` y transparencia
- ✅ **Glitch effects** - Animaciones de distorsión
- ✅ **Bordes brillantes** - Efecto de líneas luminosas
- ✅ **Grid de puntos** - Patrón de fondo tipo matriz
- ✅ **Terminal aesthetic** - Tipografía monospace prominente

### Tipografía
- **Display:** Inter (Bold/Black para títulos)
- **Monospace:** JetBrains Mono (código, etiquetas, métricas)

### Componentes Destacados
- Hero con efecto de partículas/grid
- Tarjetas con borde gradiente brillante
- Sección WIM con estilo "blueprint técnico"
- Modal con glassmorphism oscuro
- Animaciones de "typing" y "pulse"

### Sensación
> "Centro de operaciones de alta tecnología. Sofisticado, misterioso, poderoso."

---

## 🎨 DISEÑO 2: Light / Corporate (`index2.html`)

### Concepto
Estética corporativa profesional y accesible. Inspirado en sitios institucionales de alta gama.

### Paleta de Colores
```
Fondo Principal:    #F8F9FA (Pearl / Gris muy claro)
Primario:           #0066FF (Azul corporativo)
Navy Deep:          #001E3C (Para textos oscuros)
Superficies:        #FFFFFF (Blanco puro)
Bordes:             #E5E7EB (Gris suave)
```

### Características Visuales
- ✅ **Fondo claro** - Espacios blancos y limpios
- ✅ **Sombras suaves** - `shadow-lg` con opacidad baja
- ✅ **Esquinas redondeadas** - `rounded-2xl` generoso
- ✅ **Contraste alto** - Texto oscuro sobre fondo claro
- ✅ **Iconografía limpia** - Material Symbols sin efectos
- ✅ **Espaciado generoso** - Breathing room amplio

### Tipografía
- **Display:** Inter (Medium/Semibold para títulos)
- **Monospace:** JetBrains Mono (solo en etiquetas técnicas pequeñas)

### Componentes Destacados
- Hero con gradientes suaves
- Tarjetas blancas con sombra y borde fino
- Sección WIM con ilustración más "sólida"
- Modal con fondo blanco y sombra
- Transiciones suaves sin efectos llamativos

### Sensación
> "Confianza institucional. Profesional, accesible, establecido."

---

## 🎨 DISEÑO 3: Modern Enterprise Tech (`index3.html`)

### Concepto
Punto medio entre los dos anteriores. Estética "Modern Enterprise" inspirada en Vercel, Linear y Stripe Dark Mode. Alta ingeniería sin ser agresivo.

### Paleta de Colores
```
Fondo Principal:    #0F172A (Slate-950 - Azul/gris muy profundo)
Primario:           #6366F1 (Indigo)
Acento:             #8B5CF6 (Violeta)
Superficies:        #1E293B (Slate-900)
Bordes:             rgba(255,255,255,0.05) (Ultra sutiles)
```

### Características Visuales
- ❌ **Sin scanlines** - Eliminados completamente
- ❌ **Sin glitch effects** - Nada de distorsión
- ✅ **Gradientes sutiles** - Indigo a Violeta con baja saturación
- ✅ **Sombras de color** - `shadow-indigo-500/20` para elevación
- ✅ **Bordes ultra finos** - `border-white/5`
- ✅ **Orbes de luz difusa** - Blobs con blur para profundidad
- ✅ **Grid pattern sutil** - Líneas casi invisibles
- ✅ **Animaciones orbit** - Círculos rotando suavemente

### Tipografía
- **Display:** Inter (Extrabold para títulos, pesos fuertes)
- **Monospace:** JetBrains Mono (solo detalles muy pequeños: tags, labels)

### Componentes Destacados
- Hero con orbes flotantes y círculo de stats orbital
- Tarjetas `.card-v3` con gradiente interno y glow sutil
- Sección WIM con **camión vectorial con gradientes** (punto medio entre blueprint y sólido)
- Modal con backdrop blur y sombra glow
- Botones `.btn-glow` con sombra de color

### Sensación
> "Alta ingeniería, sofisticación, limpieza, velocidad. Startup de elite que escala enterprise."

---

## 📋 CONTENIDO COMÚN (Los 3 diseños)

Todos los archivos comparten **exactamente la misma estructura de contenido**:

### 1. Navegación
- Logo Newcom (imagen `img/logoNewcom.png`)
- Links: Ecosistema, Capacidades, WIM, Métricas
- Status "Online" con indicador verde
- Botón de Contacto → Abre Modal

### 2. Hero Section
- Badge "Integrador Tecnológico"
- Título: "Sistemas Complejos"
- Descripción del valor propuesto
- CTAs: "Solicitar Demo" + "Ver Demo"
- Estadística de precisión LPR (99.8%)

### 3. Trusted By
Logos de clientes:
- AUSA
- AUBASA
- Policía CABA
- Vialidad
- Ministerio de Transporte

### 4. Bento Grid - 4 Pilares Tecnológicos

| Pilar | Nombre | Tecnologías |
|-------|--------|-------------|
| 01 | ITS & Infraestructura Crítica | LPR, WIM, Anillo Digital |
| 02 | Software Factory & Cloud | Java, .Net, PHP, Python |
| 03 | Apps & Movilidad | iOS, Android, React Native |
| 04 | QA, IoT & Big Analytics | Testing, IoT, Big Data |

### 5. Deep Dive - Capacidades Verticales (Zig-Zag)

4 bloques alternando texto/visual:

1. **Infraestructura Física & IoT**
   - Visual: Nodos de red conectados (SVG)
   - Contenido: Sensores, LPR, Controladores, Gateways

2. **Ingeniería de Software**
   - Visual: Terminal con código Java
   - Contenido: Microservicios, APIs, Legacy, DevOps

3. **Movilidad Corporativa**
   - Visual: Mockup de celular con app
   - Contenido: Apps nativas, React Native, Offline, Push

4. **Inteligencia de Datos**
   - Visual: Gráfico de barras animado
   - Contenido: Dashboards, ETL, ML, Reportes

### 6. WIM Section (Pesaje Dinámico)
- Ilustración de camión con sensores
- Distribución de peso por eje
- Panel de telemetría en vivo
- Métricas: Peso bruto, velocidad, ejes, estado

### 7. Métricas de Rendimiento
- Transacciones/Día: 1.2M+
- Latencia: <20ms
- Uptime: 99.97%
- Ciudades: 25+
- Usuarios activos: 10K+
- Reconocimientos: 8

### 8. Security Section
- Encriptación E2E (AES-256)
- Arquitectura Zero Trust
- Visual orbital con escudo

### 9. Footer
- Logo e información de contacto
- Links de navegación
- Mini mapa con coordenadas
- Formulario de suscripción rápido
- Botón "Formulario Completo" → Abre Modal

### 10. Modal de Contacto Premium
Formulario B2B expandido:
- Nombre Completo *
- Teléfono / WhatsApp *
- Email Corporativo *
- Área de Interés * (select con opciones de los 4 pilares)
- Mensaje (textarea)
- Botón "Iniciar Conversación"

---

## 🔧 TECNOLOGÍAS UTILIZADAS

| Tecnología | Uso |
|------------|-----|
| **Tailwind CSS** | Framework de estilos (CDN) |
| **Google Fonts** | Inter + JetBrains Mono |
| **Material Symbols** | Iconografía (Outlined) |
| **JavaScript Vanilla** | Animaciones, Modal, Contadores |
| **SVG** | Ilustraciones técnicas inline |

### Configuración Tailwind Extendida
```javascript
tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: "#...",      // Varía por diseño
                accent: "#...",       // Varía por diseño
                // ...
            },
            fontFamily: {
                display: ["Inter", "sans-serif"],
                mono: ["JetBrains Mono", "monospace"],
            },
            // Animaciones custom, sombras, gradientes...
        }
    }
}
```

---

## 📱 RESPONSIVIDAD

Los 3 diseños son **full responsive**:
- Mobile: Stack vertical, padding reducido
- Tablet: Grid 2 columnas
- Desktop: Grid completo, efectos visuales completos

---

## ♿ ACCESIBILIDAD

- Contraste de color adecuado
- Focus states visibles
- Alt text en imágenes
- Semántica HTML correcta
- Navegación por teclado (Escape cierra modal)

---

## 📂 ASSETS REQUERIDOS

```
img/
└── logoNewcom.png    # Logo de la empresa (usado como favicon y en nav/footer)
```

---

## 🚀 USO RECOMENDADO

| Contexto | Diseño Recomendado |
|----------|-------------------|
| Presentación a equipo técnico / IT | `index.html` (Dark/Hacker) |
| Presentación a directivos / gobierno | `index2.html` (Light/Corporate) |
| Sitio web público principal | `index3.html` (Modern Enterprise) |

---

*Documento generado para el proyecto Newcom Argentina V2.0*
