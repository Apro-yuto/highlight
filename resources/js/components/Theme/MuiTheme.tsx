import { createTheme } from '@mui/material/styles';

const MuiTheme = createTheme({
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

export default MuiTheme;