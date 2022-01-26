import React from 'react'
import { Link } from '@inertiajs/inertia-react'
import AppBar from '@mui/material/AppBar'
import Toolbar from '@mui/material/Toolbar'
import Box from '@mui/material/Box'
import Styles from '@/sass/Layout/Header.module.scss'
import IconButton from '@mui/material/IconButton'
import Button from '@mui/material/Button'
import MenuIcon from '@mui/icons-material/Menu'

const Header: React.VFC = () => {
  return (
    <Box>
      <AppBar position="static">
        <Toolbar className={Styles.appBar} variant="dense">
          <Button>
            <a className={Styles.title} href="/item">
              HIGHLIGHT
            </a>
          </Button>
          <Button sx={{ ml: 'auto' }}>
            <Link className={Styles.link} as="p" href="/logout" method="post">
              LOGOUT
            </Link>
          </Button>
          <IconButton
            className={Styles.icon}
            size="medium"
            edge="start"
            aria-label="menu"
            sx={{ ml: 'auto' }}
          >
            <MenuIcon />
          </IconButton>
        </Toolbar>
      </AppBar>
    </Box>
  )
}

export default Header
