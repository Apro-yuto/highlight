import React, { ReactNode, useState } from 'react'
import Box from '@mui/material/Box'
import Header from '@/js/components/Header'
import Toolbar from '@mui/material/Toolbar'
import Sidemenu from '@/js/components/Sidemenu'
import { createTheme } from '@mui/material/styles'
import { ThemeProvider } from '@mui/material'

const Layout: React.VFC<{ children: ReactNode }> = ({ children }) => {
  const [isOpen, toggleIsOpen]: [
    boolean,
    React.Dispatch<React.SetStateAction<boolean>>,
  ] = useState<boolean>(false)

  const theme = createTheme({
    breakpoints: {
      values: {
        xs: 0,
        sm: 750,
        md: 751,
        lg: 1150,
        xl: 1800,
      },
    },
  })

  return (
    <main>
      <ThemeProvider theme={theme}>
        <Header toggleIsOpen={() => toggleIsOpen(!isOpen)} />
        <Box sx={{ display: 'flex' }}>
          <Sidemenu isOpen={isOpen} />
          <Box component="main" sx={{ flexGrow: 1, p: 3 }}>
            <Toolbar />
            <section>{children}</section>
          </Box>
        </Box>
      </ThemeProvider>
    </main>
  )
}

export default Layout
